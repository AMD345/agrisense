import pickle
import numpy as np
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.compose import ColumnTransformer
from sklearn.pipeline import Pipeline
from sklearn.preprocessing import StandardScaler
from sklearn.ensemble import BaggingClassifier, RandomForestClassifier
from sklearn.metrics import accuracy_score

# Load data
crop = pd.read_csv("Crop_recommendation.csv")

# Data preprocessing
crop_dict = {
    'rice': 1, 'maize': 2, 'jute': 3, 'cotton': 4, 'coconut': 5, 'papaya': 6, 'orange': 7,
    'apple': 8, 'muskmelon': 9, 'watermelon': 10, 'grapes': 11, 'mango': 12, 'banana': 13,
    'pomegranate': 14, 'lentil': 15, 'blackgram': 16, 'mungbean': 17, 'mothbeans': 18,
    'pigeonpeas': 19, 'kidneybeans': 20, 'chickpea': 21, 'coffee': 22
}
crop['crop_num'] = crop['label'].map(crop_dict)

# Data splitting
X = crop.drop(['crop_num', 'label'], axis=1)
y = crop['crop_num']

X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Create a pipeline with ColumnTransformer for preprocessing and BaggingClassifier with RandomForestClassifier as base estimator
preprocessor = ColumnTransformer(
    transformers=[('num', StandardScaler(), X.columns)]
)

# Use BaggingClassifier with RandomForestClassifier as base estimator
base_estimator = RandomForestClassifier(random_state=42)
bagging_classifier = BaggingClassifier(base_estimator=base_estimator, n_estimators=10, random_state=42)

pipeline = Pipeline([
    ('preprocessor', preprocessor),
    ('classifier', bagging_classifier)
])

# Model training and evaluation
pipeline.fit(X_train, y_train)
y_pred = pipeline.predict(X_test)
baggingAccuracy = accuracy_score(y_test, y_pred)

# Crop recommendation function
def recommendation(N, P, k, temperature, humidity, ph, rainfall):
    features = pd.DataFrame([[N, P, k, temperature, humidity, ph, rainfall]], columns=X.columns)
    prediction_prob = pipeline.predict_proba(features)
    predicted_class = pipeline.predict(features)
    
    # Extracting the confidence level for the predicted class
    confidence = prediction_prob[0][predicted_class[0] - 1]  # Adjust index
    
    return predicted_class, confidence

# Mapping crop numbers to crop names
crop_dict = {
    1: "Rice", 2: "Maize", 3: "Jute", 4: "Cotton", 5: "Coconut", 6: "Papaya", 7: "Orange",
    8: "Apple", 9: "Muskmelon", 10: "Watermelon", 11: "Grapes", 12: "Mango", 13: "Banana",
    14: "Pomegranate", 15: "Lentil", 16: "Blackgram", 17: "Mungbean", 18: "Mothbeans",
    19: "Pigeonpeas", 20: "Kidneybeans", 21: "Chickpea", 22: "Coffee"
}

# Select 150 random rows
random_rows = crop.sample(n=150, random_state=42)

# Loop through the random rows and call the recommendation function
for index, row in random_rows.iterrows():
    N, P, k, temperature, humidity, ph, rainfall = row[['N', 'P', 'K', 'temperature', 'humidity', 'ph', 'rainfall']]
    predict, confidence = recommendation(N, P, k, temperature, humidity, ph, rainfall)
    
    if predict[0] in crop_dict:
        crop_name = crop_dict[predict[0]]
        print(f"Row {index}: {crop_name} is a recommended crop to be cultivated with confidence {confidence:.5f}")

# Save the trained model using pickle
try:
    with open('bagging.pkl', 'wb') as model_file:
        pickle.dump(pipeline, model_file)
    # print('Success: Model saved successfully.')
except Exception as e:
    print(f'Error: {e}')

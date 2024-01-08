import sys
import pickle
import pandas as pd
import numpy as np
from scipy.special import expit  # Import expit function from scipy.special

# Load the saved SVM model
try:
    with open('svm.pkl', 'rb') as model_file:
        loaded_model = pickle.load(model_file)
except Exception as e:
    print(f'Error: {e}')

# Define the recommendation function
def recommendation(N, P, k, temperature, humidity, ph, rainfall):
    # Create a DataFrame with the input features
    features = pd.DataFrame([[N, P, k, temperature, humidity, ph, rainfall]],
                            columns=['N', 'P', 'K', 'temperature', 'humidity', 'ph', 'rainfall'])
    
    # Make predictions using the loaded model
    prediction_prob = loaded_model.decision_function(features)  # Use decision_function for SVM
    predicted_class = loaded_model.predict(features)
    
    # Extracting the confidence level for the predicted class
    confidence = expit(np.max(prediction_prob))  # Using expit to scale the decision function output
    
    return predicted_class, confidence

# new instance
N, P, k, temperature, humidity, ph, rainfall = float(sys.argv[1]), float(sys.argv[2]), float(sys.argv[3]), float(sys.argv[4]), float(sys.argv[5]), float(sys.argv[6]), float(sys.argv[7])
predict, confidence = recommendation(N, P, k, temperature, humidity, ph, rainfall)

# predict, confidence = recommendation(74,35,40,26.49109635,80.15836264,6.980400905,242.8640342)

crop_dict = {
    1: {"crop": "Rice", "season": "Wet Season"},
    2: {"crop": "Maize", "season": "Dry Season & Wet Season"},
    3: {"crop": "Jute", "season": "Wet Season"},
    4: {"crop": "Cotton", "season": "Dry Season"},
    5: {"crop": "Coconut", "season": "Wet Season"},
    6: {"crop": "Papaya", "season": "Wet Season"},
    7: {"crop": "Orange", "season": "Wet Season"},
    8: {"crop": "Apple", "season": "Wet Season"},
    9: {"crop": "Muskmelon", "season": "Dry Season"},
    10: {"crop": "Watermelon", "season": "Wet Season"},
    11: {"crop": "Grapes", "season": "Dry Season & Wet Season"},
    12: {"crop": "Mango", "season": "Dry Season & Wet Season"},
    13: {"crop": "Banana", "season": "Wet Season"},
    14: {"crop": "Pomegranate", "season": "Dry Season & Wet Season"},
    15: {"crop": "Lentil", "season": "Dry Season"},
    16: {"crop": "Blackgram", "season": "Dry Season"},
    17: {"crop": "Mungbean", "season": "Dry Season"},
    18: {"crop": "Mothbeans", "season": "Dry Season"},
    19: {"crop": "Pigeonpeas", "season": "Dry Season & Wet Season"},
    20: {"crop": "Kidneybeans", "season": "Dry Season"},
    21: {"crop": "Chickpea", "season": "Dry Season"},
    22: {"crop": "Coffee", "season": "Wet Season"}
}

if predict[0] in crop_dict:
    crop_info = crop_dict[predict[0]]
    crop_name = crop_info["crop"]
    season_suitability = crop_info["season"]
    
    result = crop_name + ", " + str(confidence) + ", " + season_suitability + ", Support Vector Machine"
    
    print(result)
else:
    print("Error: Unable to map the predicted class to a crop name.")

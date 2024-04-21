import pandas as pd
import numpy as np
import json
import sys
from sklearn.ensemble import RandomForestRegressor
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import OneHotEncoder
import joblib

# Split the data into training and testing sets

# Categorical columns for one-hot encoding
categorical_cols = ['State_Name', 'District_Name', 'Season', 'Crop']

# One-hot encode the categorical columns
ohe = joblib.load(r"C:\xampp\htdocs\agriculture-portal-main\farmer\ML\yield_prediction\hote.h5")
# Train the model
model = joblib.load(r"C:\xampp\htdocs\agriculture-portal-main\farmer\ML\yield_prediction\yield.h5")
# Get the input parameters as command line arguments
Jstate = sys.argv[1]
Jdistrict = sys.argv[2]
Jseason = sys.argv[3]
Jcrops = sys.argv[4]
Jarea = sys.argv[5]

    
#Get the user inputs and store them in a numpy array  - ans is 427.64
#user_input = np.array([['Karnataka', 'BAGALKOT', 'Kharif', 'Rice', 197]])

user_input = np.array([[Jstate,Jdistrict,Jseason,Jcrops,Jarea]])


# Convert the categorical columns to one-hot encoding
user_input_categorical = ohe.transform(user_input[:, :4])

# Combine the one-hot encoded categorical columns and numerical columns
user_input_final = np.hstack((user_input_categorical.toarray(), user_input[:, 4:].astype(float)))

# Make the prediction
prediction = model.predict(user_input_final)

# Return the prediction as a string

print(str(prediction[0]))




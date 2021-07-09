#Hybrid Ensemble Deep Learning Method

from time import sleep
import base64
import urllib.request
import array
# Importing the libraries
from tensorflow.keras.layers import *
from tensorflow.keras.models import * 
from tensorflow.keras.preprocessing import image
import os


import numpy as np
import matplotlib.pyplot as plt
import pandas as pd
import wget
import cv2

def exp(a):
    if(a==1):
        out = "meningioma"
        return out
    
    if(a==2):
        out = "no tumor"
        return out

    if(a==3):
        out = "pituitary"
        return out
    
    if(a==0):
        out = "gioma"
        return out
    
model1 = load_model("mnet1.h5")
model1.summary()

model2 = load_model("mnet2.h5")
model2.summary()

model3 = load_model("mnet3.h5")
model3.summary()

print("success")

ft=0
st=0
lt=0
rt=0
ut=0

h=""
out=""
while h!="quit":
    url = "http://iotproject2021.000webhostapp.com/Brain_Tumor/get.php"
    response = urllib.request.urlopen(url).read()
    arr=response
    arr=str(arr)
    print(arr)
    val = len(arr)
    flg=0
    i=0;
    root=""
    while True:
        a=arr[i]
        i=i+1
        if(a=='a'):
            while True:
                a=arr[i]
                i=i+1
                if(a=='b'):
                    flg=1
                    break
                root=root+a
        if(flg==1):
            break
    print(root)
    image_url = "http://iotproject2021.000webhostapp.com/Brain_Tumor/"+root
    
    # Use wget download method to download specified image url.
    image_filename = wget.download(image_url)
    
    print('Image Successfully Downloaded: ', image_filename)
    nm=0;
    ml=0;

    img = image.load_img(image_filename,target_size=(224,224))
    img = image.img_to_array(img)
    img = np.expand_dims(img,axis=0)   ### flattening
    ypred1 = model1.predict_classes(img)
    ypred1=ypred1.round()
    ypred2 = model1.predict_classes(img)
    ypred2=ypred2.round()
    ypred3 = model1.predict_classes(img)
    ypred3=ypred3.round()
    
    ypred4 = model2.predict_classes(img)
    ypred4=ypred4.round()
    ypred5 = model2.predict_classes(img)
    ypred5=ypred5.round()
    ypred6 = model2.predict_classes(img)
    ypred6=ypred6.round()

    ypred7 = model3.predict_classes(img)
    ypred7=ypred7.round()
    ypred8 = model3.predict_classes(img)
    ypred8=ypred8.round()
    ypred9 = model3.predict_classes(img)
    ypred9=ypred9.round()
    
    if(ypred1[0]==0):
        ft+=1
    elif(ypred1[0]==1):
        st+=1;
    elif(ypred1[0]==2):
        lt+=1;
    elif(ypred1[0]==3):
        rt+=1;
        
    if(ypred2[0]==0):
        ft+=1
    elif(ypred2[0]==1):
        st+=1;
    elif(ypred2[0]==2):
        lt+=1;
    elif(ypred2[0]==3):
        rt+=1;
        
    if(ypred3[0]==0):
        ft+=1
    elif(ypred3[0]==1):
        st+=1
    elif(ypred3[0]==2):
        lt+=1;
    elif(ypred3[0]==3):
        rt+=1;
    
    if(ypred4[0]==0):
        ft+=1
    elif(ypred4[0]==1):
        st+=1;
    elif(ypred4[0]==2):
        lt+=1;
    elif(ypred4[0]==3):
        rt+=1;
    
    
    if(ypred5[0]==0):
        ft+=1
    elif(ypred5[0]==1):
        st+=1;
    elif(ypred5[0]==2):
        lt+=1;
    elif(ypred5[0]==3):
        rt+=1;

    
    if(ypred6[0]==0):
        ft+=1
    elif(ypred6[0]==1):
        st+=1;
    elif(ypred6[0]==2):
        lt+=1;
    elif(ypred6[0]==3):
        rt+=1;

    
    if(ypred7[0]==0):
        ft+=1
    elif(ypred7[0]==1):
        st+=1;
    elif(ypred7[0]==2):
        lt+=1;
    elif(ypred7[0]==3):
        rt+=1;
    
    if(ypred8[0]==0):
        ft+=1
    elif(ypred8[0]==1):
        st+=1;
    elif(ypred8[0]==2):
        lt+=1;
    elif(ypred8[0]==3):
        rt+=1;

    
    if(ypred9[0]==0):
        ft+=1
    elif(ypred9[0]==1):
        st+=1;
    elif(ypred9[0]==2):
        lt+=1;
    elif(ypred9[0]==3):
        rt+=1;
    print(" ")
    print(ft)
    print(" ")
    print(st)
    print(" ")
    print(lt)
    print(" ")
    print(rt)
    if((ft>st)and(ft>lt)and(ft>rt)):
        out = "glioma"
        url = "http://iotproject2021.000webhostapp.com/Brain_Tumor/update.php?report=Glioma"
    elif((st>ft)and(st>lt)and(st>rt)):
        out = "meningioma"
        url = "http://iotproject2021.000webhostapp.com/Brain_Tumor/update.php?report=Meningioma"
    elif((lt>ft)and(lt>st)and(lt>rt)):
        out = "Normal"
        url = "http://iotproject2021.000webhostapp.com/Brain_Tumor/update.php?report=Normal"
    elif((rt>ft)and(rt>st)and(rt>lt)):
        out = "pituitary"
        url = "http://iotproject2021.000webhostapp.com/Brain_Tumor/update.php?report=Pituitary"
    ft=0
    st=0
    lt=0
    rt=0
    ut=0
    
    print(out)
    print(" ")
    print(url)
    print(" ")
    response = urllib.request.urlopen(url).read()
    arr=response
    arr=str(arr)
    print(arr)
    try: 
        os.remove(image_filename)
    except:
        pass
    sleep(4)

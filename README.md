# Adorncommerce CallForPrice

## Compatibility

* Name: Call For Price 
* Compatible With: <br />
  * PHP : >= 5.6
  * Magento Community: >= 2.1 <br /> 

## Description
Call for Price extension helps to hide product price and Add to Cart and replace it with the Call For Price button to encourage visitors to contact you for a quote.

## FEATURE HIGHLIGHTS

 *  Hide product price and Add to Cart and replace it with the Call For Price button to encourage visitors to contact you for a quote.
 *  Hide product price and button for particuller customer group.

## Installation

##### Using Composer

 Run the following command in Magento 2 root folder:
 
 Step 1 : composer require adorncommerce/module-callforprice
 
 Step 2 : php bin/magento setup:upgrade
 
 Step 3 : php bin/magento setup:static-content:deploy

##### Manual Installation

 Step 1: Unzip the file.
 
 Step 2: Create another directory called app/code/Adorncommerce/CallForPrice . Then, you put the contents of the extension ZIP file in there.
 
 Step 3: Upload the directory app/code/Adorncommerce/CallForPrice into the root directory of your Magento installation. The root directory of Magento is the directory that contains the directories "app", "bin", "lib" and more. All directories should match the existing directory structure.
 
 Step 4: Go to Magento 2 root directory. Run: php bin/magento setup:upgrade.
 
 Step 5: Run: php bin/magento setup:static-content:deploy.
 
 Step 6: Clear all Caches.

## Call For Price Configration -

##### Enable Call For Price :- 
  
    Stores -> Configuration -> Adorncommerce -> Call For Price -> Enable

    
* <b>Call For Price Button Text</b> :- Set call for price button text.

* <b>Send Email</b> :- Set Call for Price Request Email Receiver Email Id.
      
* <b>Email Sender</b> :- Email Sender for call for price request.
  
* <b>Customer Group</b> :- Enable Call for price request button for selected customer group.
  
  

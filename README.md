# OCR-IdentityReader Api
A project that uses Tesseract and RegEx to extract details from Turkish National Identification Cards and Driving License in a structured format.

# Requirements
  1. Php: ^7.3
  2. MySql


# Installation
1. Follow [instructions](https://github.com/tesseract-ocr/tesseract#installing-tesseract) to install tesseract
2. Update composer by run:
      ```    
        composer update
      ```  
3. Create empty database then Configure database settings in .env file
4. Creaa database tables by run:
      ```    
        php artisan migrate
      ```  
5. Serve our project by run:
      ```    
        php artisan serve
      ```  
6. Import [ocr.postman_collection](https://github.com/ahmed-a-elngar/OCR-IdentityReader/blob/main/ocr.postman_collection.json) which is a postman collection and enjoy it 😉

# Information
1. module number guide:
    1. National Identification Card = 1
    2. Licence Card = 2

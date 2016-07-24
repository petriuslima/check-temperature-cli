# temperature
Just because I want to check the temperature from the command line

## Download and Execute ##
To download the file open de command and and type the following command:

`wget https://raw.githubusercontent.com/petriuslima/temperature/master/temperature.php -O /usr/bin/temperature`


and give permission to execute the script with `chmod +x /usr/bin/temperature`

Now, to check the temperature type `temperature {cityname}` on the command line.

The default country is Brazil and if you want to check the temperature in a city from another country, just type the country code (ISO 3166) after the cityname, like: `php temperature.php {cityname} {countrycode}`

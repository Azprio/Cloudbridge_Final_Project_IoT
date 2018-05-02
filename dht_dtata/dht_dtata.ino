// Example testing sketch for various DHT humidity/temperature sensors
// Written by ladyada, public domain

#include "DHT.h"

#define DHTPIN 6 // what digital pin we're connected to

int smoke=A2;
int lpg= A3;
int smd=4;


// Uncomment whatever type you're using!
#define DHTTYPE DHT11   // DHT 11
//#define DHTTYPE DHT22   // DHT 22  (AM2302), AM2321
//#define DHTTYPE DHT21   // DHT 21 (AM2301)

// Connect pin 1 (on the left) of the sensor to +5V
// NOTE: If using a board with 3.3V logic like an Arduino Due connect pin 1
// to 3.3V instead of 5V!
// Connect pin 2 of the sensor to whatever your DHTPIN is
// Connect pin 4 (on the right) of the sensor to GROUND
// Connect a 10K resistor from pin 2 (data) to pin 1 (power) of the sensor

// Initialize DHT sensor.
// Note that older versions of this library took an optional third parameter to
// tweak the timings for faster processors.  This parameter is no longer needed
// as the current DHT reading algorithm adjusts itself to work on faster procs.
DHT dht(DHTPIN, DHTTYPE);

void setup() {
  pinMode(smoke, INPUT);
  pinMode(lpg, INPUT);
  Serial.begin(9600);
  dht.begin();
}

void loop() {
  
  if (digitalWrite(4)==1){
    int smdd=1;
  }else {
    smdd=0;
  }
  // Wait a few seconds between measurements.
  delay(2000);

  // Reading temperature or humidity takes about 250 milliseconds!
  // Sensor readings may also be up to 2 seconds 'old' (its a very slow sensor)
  float h = dht.readHumidity();
  // Read temperature as Celsius (the default)
  float t = dht.readTemperature();
  // Read temperature as Fahrenheit (isFahrenheit = true)
  float f = dht.readTemperature(true);

  float lp=analogRead(lpg) ;
  float sm=analogRead(smoke);
  float l = (float)lp/1024*100.00;
  float s = (float)sm/1024*100.00;

  
  // Check if any reads failed and exit early (to try again).
  if (isnan(h) || isnan(t) || isnan(f)) {
    float h=00.00;
    float t=0.00;
    float f=0.00;
    Serial.print(h);
    Serial.print(',');
    Serial.print(t);
    Serial.print(',');
    Serial.print(f);
    Serial.print(',');
    Serial.print(l);
    Serial.print(',');
    Serial.print(s);
    Serial.print(',');
    Serial.print(smd);
    Serial.println(',');
  }
else{
    Serial.print(h);
    Serial.print(',');
    Serial.print(t);
    Serial.print(',');
    Serial.print(f);
    Serial.print(',');
    Serial.print(l);
    Serial.print(',');
    Serial.print(s);
    Serial.print(',');
    Serial.print(smd);
    Serial.println(',');
}
}

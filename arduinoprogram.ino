#include <Arduino.h>

#include <ESP8266WiFi.h>

#include <ESP8266WiFiMulti.h>

#include <ArduinoJson.h>

#include <ESP8266HTTPClient.h>

#include <WiFiClientSecureBearSSL.h>

#include <NewPing.h>

#include "DHT.h"

//setting jaringan
const char * ssid = "";
const char * password = "";
const char * host = "restu.tutorkilat.com";

#define fingerprint "56 AE 15 CF 51 DD AA C4 39 44 B1 A5 51 68 0D BA B4 AE 97 7D"

// Lampu

int lampu1 = D3;
int lampu2 = D4;
int lampu3 = D6;
int pagar = D7;
int pintu = D8;

//UltraSonic

#define TRIGGER_PIN D0 // Arduino pin tied to trigger pin on the ultrasonic sensor.
#define ECHO_PIN D1 // Arduino pin tied to echo pin on the ultrasonic sensor.
#define MAX_DISTANCE 200 // Maximum distance we want to ping for (in centimeters). Maximum sensor distance is rated at 400-500cm.

int lampuwc = D2;
int jarak;

NewPing sonar(TRIGGER_PIN, ECHO_PIN, MAX_DISTANCE); // NewPing setup of pins and maximum distance.

// Sensor Suhu

#define DHTPIN D5
#define DHTTYPE DHT22 // DHT 22  (AM2302), AM2321
DHT dht(DHTPIN, DHTTYPE);

void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
  pinMode(lampuwc, OUTPUT);
  pinMode(lampu1, OUTPUT);
  pinMode(lampu2, OUTPUT);
  pinMode(lampu3, OUTPUT);
  pinMode(pintu, OUTPUT);
  pinMode(pagar, OUTPUT);

  dht.begin();

  WiFi.begin(ssid, password);

  //cek koneksi wifi
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    delay(500);
  }

  Serial.println("WiFi Connected");

}

void loop() {
  int ultrasonic = sonar.ping_cm();

      Serial.println(ultrasonic);

  if (ultrasonic > 0 && ultrasonic < 10) {
    digitalWrite(lampuwc, HIGH);
    Serial.println("NYALA");
  } else if (ultrasonic >= 10) {
    digitalWrite(lampuwc, LOW);
    Serial.println("MATI");
  }

  // Reading temperature or humidity takes about 250 milliseconds!
  // Sensor readings may also be up to 2 seconds 'old' (its a very slow sensor)
  float h = dht.readHumidity();
  // Read temperature as Celsius (the default)
  float t = dht.readTemperature();
  // Read temperature as Fahrenheit (isFahrenheit = true)
  float f = dht.readTemperature(true);

  // Check if any reads failed and exit early (to try again).
  if (isnan(h) || isnan(t) || isnan(f)) {
    Serial.println(F("Failed to read from DHT sensor!"));
    return;
  }

  // Compute heat index in Fahrenheit (the default)
  float hif = dht.computeHeatIndex(f, h);
  // Compute heat index in Celsius (isFahreheit = false)
  float hic = dht.computeHeatIndex(t, h, false);

  //                  Serial.print(F("Humidity: "));
  //                  Serial.print(h);
  //                  
  //                  Serial.print(F("%  Temperature: "));
  //                  Serial.print(t);
  //                  
  //                  Serial.print(F("°C "));
  //                  Serial.print(f);
  //                  
  //                  Serial.print(F("°F  Heat index: "));
  //                  Serial.print(hic);
  //                  Serial.print(F("°C "));
  //                  Serial.print(hif);
  //                  Serial.println(F("°F"));
  //
  Serial.println(h);
  Serial.println(t);
  Serial.println(f);
  Serial.println(hic);
  Serial.println(hif);

  if (WiFi.status() == WL_CONNECTED) {
    std::unique_ptr < BearSSL::WiFiClientSecure > client(new BearSSL::WiFiClientSecure);

    client -> setFingerprint(fingerprint);

    String Link;
    HTTPClient https;

    Link = "https://restu.tutorkilat.com/updatesensor.php?ultrasonic=" + String(ultrasonic) + "&humidity=" + String(h) + "&tempc=" + String(t) + "&tempf=" + String(f) + "&hic=" + String(hic) + "&hif=" + String(hif);

    //eksekusi link
    https.begin( * client, Link);
    https.GET();

    https.begin( * client, "https://restu.tutorkilat.com/getData.php");
    https.GET();

    String payload = https.getString();
    Serial.println();
    Serial.println(payload);

    // Stream& input;
    StaticJsonDocument < 512 > doc;
    DeserializationError error = deserializeJson(doc, payload);
    if (error) {
      Serial.print("deserializeJson() failed: ");
      Serial.println(error.c_str());
      return;
    }

    int lampuState1 = doc["lampu1"];
    int lampuState2 = doc["lampu2"];
    int lampuState3 = doc["lampu3"];
    int pintuState = doc["pintu"];
    int pagarState = doc["pagar"];

    if (lampuState1 == 0) {
      digitalWrite(lampu1, LOW);
    } else {
      digitalWrite(lampu1, HIGH);
    }

    if (lampuState2 == 0) {
      digitalWrite(lampu2, LOW);
    } else {
      digitalWrite(lampu2, HIGH);
    }

    if (lampuState3 == 0) {
      digitalWrite(lampu3, LOW);
    } else {
      digitalWrite(lampu3, HIGH);
    }

    if (pintuState == 0) {
      digitalWrite(pintu, LOW);
    } else {
      digitalWrite(pintu, HIGH);
    }

    if (pagarState == 0) {
      digitalWrite(pagar, LOW);
    } else {
      digitalWrite(pagar, HIGH);
    }

    https.end();
    delay(1000);
  }

}

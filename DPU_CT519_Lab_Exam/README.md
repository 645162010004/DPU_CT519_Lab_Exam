

ทำการสร้างไฟล์ 004_Lab_Exam Docker-Compose ขึ้นมาโดยใช้ชื่อ docker-compose.yaml แล้วจึงสั่งรัน
sudo docker-compose up -d

version: '3.8'
services:
  APP_A:
    image: golang:1.16-alpine
    container_name: APP_A
    volumes:
      - './APP_A:/app'
    working_dir: /app
    ports:
      - 80:80
  APP_B:
    image: golang:1.16-alpine
    container_name: APP_B
    volumes:
      - './APP_B:/app'
    working_dir: /app
    ports:
      - 80:9904


แล้วจึงทำการตรวจสอบ Service ที่เกิดขึ้นผ่านหน้าเว็ปไซต์ 
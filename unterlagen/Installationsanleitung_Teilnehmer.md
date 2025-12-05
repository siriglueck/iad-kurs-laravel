
# Laravel Installationsanleitung – Teilnehmer-Version

## 1) Projektordner öffnen
```bash
cd ~/laravel
```

## 2) Tagesmaterial entpacken
```bash
cd material
unzip tagX_complete.zip -d tag-X/
```  
<small>(Das X bitte mit der entsprechenden Tagesnummer ersetzen)</small>

Falls `unzip` fehlt:
```bash
sudo apt install unzip -y
```

## 3) Laravel Development Server starten
```bash
cd ~/laravel/librarymanager
php artisan serve --host=0.0.0.0 --port=8000
```

## 4) Seite im Browser öffnen (Host-PC)
```
http://<VM-IP>:8000
```

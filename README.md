# Central Media - Laravel Weather API

Laravel 11 REST API, ami 10 percenként lekéri a városok időjárását az OpenWeather API-ról és tárolja az adatbázisban.

## Scheduler

- Lokálisan: A FetchWeatherData parancs került beidőzítésre a console.php fájlban.

## API

- Összes adat: `GET /api/weather`  
- Város szerint (elmúlt 24h): `GET /api/weather?city=Budapest`  

- Nem létező város → 404 JSON: 

```json
{ "message": "City not found." }
```
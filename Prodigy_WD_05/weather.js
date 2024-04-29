function getWeather() {
  const locationInput = document.getElementById('locationInput').value;
  const apiKey = 'dd14b401973814c1e17c809053f381cf'; // Your API key

  // Fetch weather data from OpenWeatherMap API
  fetch(`https://api.openweathermap.org/data/2.5/weather?q=${locationInput}&appid=${apiKey}&units=metric`)
    .then(response => response.json())
    .then(data => {
      if (data.cod === 200) {
        displayWeather(data);
      } else {
        document.getElementById('weatherInfo').innerHTML = `<p>${data.message}</p>`;
      }
    })
    .catch(error => {
      console.error('Error fetching weather data:', error);
    });
}

function displayWeather(weatherData) {
  const weatherInfoElement = document.getElementById('weatherInfo');
  const weatherDescription = weatherData.weather[0].description;
  const temperature = weatherData.main.temp;
  const humidity = weatherData.main.humidity;
  const windSpeed = weatherData.wind.speed;

  weatherInfoElement.innerHTML = `
    <h2>Weather in ${weatherData.name}</h2>
    <p>Description: ${weatherDescription}</p>
    <p>Temperature: ${temperature}°C</p>
    <p>Humidity: ${humidity}%</p>
    <p>Wind Speed: ${windSpeed} m/s</p>
  `;
}

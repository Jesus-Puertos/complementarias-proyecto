if (document.querySelector("#mapa")) {
  const lat = 18.65012409811037;
  const lng = 97.00783272692753;

  const zoom = 100;
  const map = L.map("mapa").setView([lat, lng], zoom);

  L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
      '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  }).addTo(map);

  L.marker([lat, -lng])
    .addTo(map)
    .bindPopup(
      `
    <h2 class="mapa__heading">TECNM Campus Zongolica</h2>
    <p class="mapa__texto">Av. Tecnológico s/n, Col. El Mirador, Zongolica, Veracruz, México.</p>
    
    `
    )
    .openPopup();
}

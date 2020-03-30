//<open-map lat="51.505" long="-0.09" w="500" h="500" z="13" p=""></open-map>


class openmap extends HTMLElement {
    constructor() {
        super()
        this.lat = this.getAttribute('lat')
        this.long = this.getAttribute('long')
        this.width = this.getAttribute('w')
        this.height = this.getAttribute('h')
        this.zoom = this.getAttribute('z')
        this.popup = this.getAttribute('p')
        this.map = document.createElement('div')
        this.map.id = "map";
        this.map.style.width = this.width;
        this.map.style.height = this.height;
        this.appendChild(this.map)

        let greenIcon = L.icon({
            iconUrl: 'https://fkbk.mooo.com/userAvatar',
            // shadowUrl: 'leaf-shadow.png',
            className: 'map-icon',
            iconSize:     [20, 20], // size of the icon
            // shadowSize:   [50, 64], // size of the shadow
            iconAnchor:   [10,10], // point of the icon which will correspond to marker's location
            // shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        let map_object = L.map('map').setView([this.lat, this.long], this.zoom);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; By FakeBook'
        }).addTo(map_object);
        L.marker([this.lat, this.long], {icon: greenIcon}).addTo(map_object);
        // .bindPopup(this.popup)
        // .openPopup();
    }
}
customElements.define('open-map', openmap)
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
require(getcwd() . "/cashlessRate.php");
$APPLICATION->SetTitle("Курсы валют");
?> 
<style>
.rectangle_1 {
    position: relative;
    margin-bottom: 30px;
    padding-left: 38px !important;
    padding-right: 30px !important;
}
.rectangle_2 {
    position: relative;
    background-color: #f9f8f4;
    position: relative;
    padding-top: 20px;
    padding-left: 38px !important;
    padding-right: 30px !important;
    width: 100%;
    height: auto;
    padding-bottom: 35px;
}
.right-column {
    width: 670px !important;
    padding-left: 0 !important;
    padding-right: 0 !important;
}
.map-Yandex-Size {
    width: 90%;
    height: 0px;
    margin-bottom: 20px;
    z-index: 10;
    transition: height 0.5s ease-in-out;
}
.map-Yandex-Exact-Size {
    z-index: 10;
    width: 100%;
    height: 525px;
    opacity: 0;
    transition: opacity;
    display: none;
}
.map-Yandex-Exact-dsp {
    display: block;
    animation: map-yandex-animate 0.5s forwards;
    animation-timing-function: ease-in-out;
    -webkit-animation-timing-function: ease-in-out;
}
.map-visibility-1 {
    display: none;
}
.map-visibility-new {
    height: 525px;
}
.map-visibility {
    animation: map-animate 0.25s forwards;
    animation-timing-function: ease-in-out;
    -webkit-animation-timing-function: ease-in-out;
}
@keyframes map-animate {
    0% {
        height: 0px;
    }
    100% {
        height: 525px;
    }
} 
@keyframes map-yandex-animate {
    0% {
        opacity: 0;
    }
    95% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
} 

.p-kursy {
    margin-bottom: 20px !important;
}
.h1-kursy {
    font-size: 20px !important;
    margin-bottom: 5px !important;
}
.controller-block {
    margin-top: 20px;
    margin-bottom: 20px;
}
.db {
    border-width: 0.5px;
    border-color: rgb(152, 152, 152);
    border-style: solid;
    border-radius: 6px;
    background-color: rgb(255, 255, 255);
    box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, 0.38);
    font-size: 12px;
    padding: 5px;
/*    height: 15px;*/
    width: 165px;
/*    border: 1px solid rgb(90, 90, 90);*/
    outline: none;
/*    border-radius: 2px;*/
    color: rgb(102, 102, 102);
}
.db-new {
    font-size: 12px;
    padding: 5px;
    height: 25px;
    width: 250px;
    border: 1px solid rgb(90, 90, 90);
    outline: none;
    border-radius: 2px;
    color: rgb(102, 102, 102);
    margin-top: 10px;
}
.db-item {
    display: block;
}
.db-datalist {
    position: absolute;
    background-color: white;
    border: 0.5px solid rgb(90, 90, 90);
    border-radius: 0 0 2px 2px;
    border-top: none;
    font-family: sans-serif;
    width: 165px;
    padding: 5px;
    max-height: 10rem;
    overflow-y: auto;
    overflow-x: hidden;
    z-index: 1;
}
option {
    background-color: white;
    padding: 4px;
    color: rgb(88, 88, 88);
    margin-bottom: 1px;
    font-size: 10px;
    cursor: pointer;
    width: 155px;
    white-space: break-spaces;
}

/*.offices {
    width: 355px;
}*/

option:hover {
    background-color: lightblue;
}

option:disabled:hover {
    background-color: white !important;
    cursor: auto !important;
}
.controller-block {
    display: flex;
    position: relative;
    align-items: center;
    justify-content: space-between;
    flex-direction: row;
    width: 90% !important;
}
.title-ofice {
    width: 90% !important;
    color: #232323 !important;
    font-weight: 600 !important;
}
.controller-item {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    flex-direction: column;
    width: 165px;
}
.controller-item .p-class {
    margin-top: 5px !important;
    margin-bottom: -5px !important;
}
.change-map {
    display: flex;
    position: relative;
    flex-direction: row;
    padding: 3px;
    border-width: 0.5px;
    border-color: rgb(152, 152, 152);
    border-style: solid;
    border-radius: 6px;
    background-color: rgb(255, 255, 255);
    font-size: 12px;
    height: 22px;
    width: 165px;
    background: url('/img/icons/bg-tab-map.png') no-repeat right top;
    transform: translateY(45%);
}
.controller-item-last {
    justify-content: flex-end !important;
    align-items: flex-end;
    
}
.change-option {
    display: flex;
    position: relative;
    align-items: center;
    justify-content: center;
    width: 50%;
    height: 100%;
    font-size: 12px;
    border-radius: 6px;
    cursor: pointer;
    -webkit-user-select: none; 
    -ms-user-select: none; 
    user-select: none; 
} 
.change-option-active {
    border-radius: 6px;
    background-image: -moz-linear-gradient( 90deg, rgb(231,105,0) 0%, rgb(240,160,0) 100%);
    background-image: -webkit-linear-gradient( 90deg, rgb(231,105,0) 0%, rgb(240,160,0) 100%);
    background-image: -ms-linear-gradient( 90deg, rgb(231,105,0) 0%, rgb(240,160,0) 100%);
    box-shadow: inset 0px 2px 3px 0px rgba(244, 187, 0, 0.004);
    color: #ffffff;
}
.currency-list-block {
    width: 90%;
    height: auto;
    display: flex;
    position: relative;
    flex-direction: column;
    align-items: flex-start;
    justify-content: left;
    font-weight: 600;
}
.currency-element {
    display: flex;
    position: relative;
    width: 100%;
    height: 25px;
    border-bottom: 0.9px solid #107340;  
    flex-direction: row;
    padding-top: 5px;
    padding-bottom: 5px;
    color: #232323;
}
.currency-element-no-border {
    border-bottom: none !important;
}
.first-currency-none {
    display: none;
}
.first-currency-show {
    display: flex;
}
.currency-element-block {
    display: flex;
    position: relative;
    width: 22%;
    height: 100%;
}
.currency-element-block-name {
    display: flex;
    position: relative;
    width: 34%;
    height: 100%;
}
.currency-element-curr {
    align-items: center !important;
    justify-content: right !important;
}
.currency-element-curr-digit {
    transform: translateX(-9px);
}
.flag-name {
    margin-left: 15px;
    transform: translateY(5px);
}
.flag-src {
    width: 40px;
    height: 24px;
}
.beznal-block {
    margin-top: 32px;
}
.converter-valut-block {
    display: flex;
    margin-top: 31px;
    position: relative;
    flex-direction: row;
}
.converter-valut-item-wrap {
    display: flex;
    position: relative;
    flex-direction: column;
    justify-content: left;
    width: 190px;
    height: 71px;
}
.converter-valut-item {
    display: flex;
    flex-direction: row !important;
    position: relative;
    width: 100%;
    height: 34px;
    font-size: 13px;
}
.converter-valut-button {
    display: flex;
    position: relative;
    width: 45px;
    height: 35px;
    align-items: center;
    justify-content: center;
    transform: translateY(28px);
}
.converter-valut-input {
    display: flex;
    position: relative;
    width: 61%;
    padding-left: 13px;
    border-width: 0.5px;
    border-color: rgb(152, 152, 152);
    border-style: solid;
    border-top-left-radius: 6px;
    border-bottom-left-radius: 6px;
    background-color: rgb(255, 255, 255);
    box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, 0.38);
    color: #555b5d;
}
.converter-valut-select {
    display: flex;
    position: relative;
    padding-left: 6px;
    padding-right: 6px;
    width: 39%;
    border-width: 0.5px;
    border-color: rgb(152, 152, 152);
    border-style: solid;
    border-top-right-radius: 6px;
    border-bottom-right-radius: 6px;
    background-color: rgb(255, 255, 255);
    box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, 0.38);
    color: #555b5d;
    border-left: none !important;
}
.converter-valut-text {
    display: flex;
    position: relative;
    margin: 0 !important;
    padding: 0 !important;
    color: #232323;
    margin-bottom: 10px !important;
    font-weight: 600;
}
.flag-converter {
    width: 20px;
    height: 20px;
    float: left;
    transform: translateY(5px);
}
.arrows-converter {
    width: 25px;
    height: 25px;
}
.my-hint {
    display: inline-block;
    padding: 5px;
    height: auto;
    position: relative;
    left: -10px;
    min-width: 195px;
    font-size: 10px;
    line-height: 17px;
    color: #272727;
    text-align: center;
    /* vertical-align: middle; */
    background-color: #ffffff;
    border: 0.2px solid #616161;
    box-shadow: 2px 4px 7px #a4a4a4;
}

</style>
<script src="https://api-maps.yandex.ru/2.1/?apikey=a0a0b5ec-c142-4ea8-b8e6-ae69a5859bef&lang=ru_RU"></script>
<div class="rectangle_1">
        <h1 class="like-h1">Обмен валют</h1>
        <p> 
            Валютно-обменные операции проводятся во всех офисах банка, при этом в некоторых из них можно обменять до 41 вида валют.<br><br> 
            Котировки зависят от текущей ситуации на рынке и могут меняться в течение дня. Рекомендуем уточнять курс покупки/продажи валюты в офисе непосредственно перед проведением операции.<br><br>
            Покупая валюту в офисах Авангарда, вы можете быть уверены в ее высоком качестве.
        </p>
</div>

<div class="rectangle_2">
    <h1 class="like-h1 h1-kursy">Курсы валют в офисах</h1>
    <p class="p-kursy">Действительно на

            <?php
            date_default_timezone_set('Europe/Moscow');
            echo date('H:i, d.m.Y', strtotime('now'));
            ?></p>
    <div class="controller-block">
        <div class="controller-item">
            <p class="p-class">Регион</p>
            <div id="cities-regions" class="db-item">
                <input class="db" autocomplete="off" role="combobox" list="" id="" name="city" placeholder="Выберите город" >
                <datalist class="db-datalist" id="" role="listbox">
                    <option value="Москва">Москва</option>
                    <option value="Казань">Казань</option>
                </datalist>
            </div>
        </div>
        <div class="controller-item">
            <p class="p-class">Офис</p>
            <div id="offices-bank" class="db-item">
                <input class="db" autocomplete="off" role="combobox" list="" id="" name="city" placeholder="Выберите офис" >
                <datalist class="db-datalist" id="" role="listbox">
                    <option value="Полянка">Полянка</option>
                    <option value="Кремль">Кремль</option>
                </datalist>
            </div>
        </div>
        <div class="controller-item controller-item-last">
            <div class="change-map">
                <div class="change-option change-option-active">Списком</div>
                <div class="change-option">На карте</div>
            </div>
        </div>
    </div>
    <div id="map-wrap" class="map-Yandex-Size">
        <div id="map" class="map-Yandex-Exact-Size"></div>
    </div>
    <div>
        <p class="title-ofice" id="office-name"></p>
    </div>
    <div class='currency-list-block currency-nal'>
        <div class='currency-element first-currency-show first-currency-show-nal'>
            <div class="currency-element-block"></div>
            <div class="currency-element-block-name"></div>
            <div class="currency-element-block currency-element-curr">Покупка</div>
            <div class="currency-element-block currency-element-curr">Продажа</div>
        </div>
        <div id="example-curr" class='currency-element first-currency-none'>
            <div class="currency-element-block"></div>
            <div class="currency-element-block-name"></div>
            <div class="currency-element-block currency-element-curr currency-element-curr-digit"></div>
            <div class="currency-element-block currency-element-curr currency-element-curr-digit"></div>
        </div>
    </div>
</div>
<div class="rectangle_1">
    <img class="flag-converter" src="/img/icons/convertor.png" alt="" srcset=""><h1 class="like-h1 h1-kursy beznal-block">Конвертер валют</h1>
    <div class="converter-valut-block">
        <div class="converter-valut-item-wrap">
            <p class="converter-valut-text">У меня есть</p>
            <div class="converter-valut-item">
                <input class="converter-valut-input" id="curr-from-input" type="text" placeholder="Введите значение" />
                <select name="curr-from-select" id="curr-from-select" class="converter-valut-select"></select>
            </div>
        </div>
        <div id="cross-course-button" class="converter-valut-button">
            <img class="arrows-converter" src="/img/icons/convertor_arrows.png" alt="" srcset="">
        </div>
        <div class="converter-valut-item-wrap">
            <p class="converter-valut-text">Хочу получить</p>
            <div class="converter-valut-item">
                <input id="curr-to-input" class="converter-valut-input" type="text" placeholder="Введите значение" />
                <select name="curr-to-select" id="curr-to-select" class="converter-valut-select"></select>
            </div>
        </div>
    </div>
    <p class="p-kursy">Информация о курсах обмена валют приводится справочно и не является<br>публичной офертой.</p>
</div>
    <div class="rectangle_2">
    <h1 class="like-h1 h1-kursy beznal-block">Безналичные курсы валют</h1>
        <p class="p-kursy">Для физических лиц при совершении операций в интернет-банке<br> или мобильном приложении</p>
        <p class="">Действительно на

            <?php
            date_default_timezone_set('Europe/Moscow');
            echo date('H:i, d.m.Y', strtotime('now'));
            ?>
        </p>
        <div class='currency-list-block'>
            <div class='currency-element first-currency-show currency-element-no-border'>
                <div class="currency-element-block"></div>
                <div class="currency-element-block-name"></div>
                <div class="currency-element-block currency-element-curr">Покупка</div>
                <div class="currency-element-block currency-element-curr">Продажа</div>
            </div>
            <?php
                function roundNumber($number)
                {
                    // return round($number, 2);
                    return number_format($number, 2, '.', '');
                }
                ?>
            <?php foreach ($cashlessRate as $cashlessRateItem): ?>
                <div class='currency-element first-currency-show'>
                    <div class="currency-element-block">
                        <?php $flagPath = $cashlessRateItem['icon']; ?>
                            <img src="/img/icons/flags/<?= $flagPath; ?>" alt="" srcset="">
                            <span class="flag-name"><?= $cashlessRateItem['currency_to']; ?></span>
                    </div>
                    <div class="currency-element-block-name"><span class="flag-name"><?= $cashlessRateItem['label']; ?></span></div>
                    <div class="currency-element-block currency-element-curr currency-element-curr-digit"><?= roundNumber($cashlessRateItem['sum_buy']); ?></div>
                    <div class="currency-element-block currency-element-curr currency-element-curr-digit"><?= roundNumber($cashlessRateItem['sum_sale']); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
</div>

<script type="text/javascript" defer>
    
    function CurrensyData(converter) {
            this.flagForScreens = "desctop";
            this.settingsForScreens();
            this.dataFromApi = [];
            this.flagsFromApi = [];
            this.closestOfficeData = [];
            this.dictCityOffices = new Map();
            this.allDictCityOffices = new Map();
            this.myCollection;
            this.myClusterer;
            this.requestToApiFirst(["55.741206", "37.614267"]);
            this.ymapsInit().then(() => {
                this.settingsOnClickCities();
                this.settingsOnClickOffices();
                this.converter = converter;
            });         
            
    }
    
    CurrensyData.prototype.settingsForScreens = function() {
        if (window.screen.width <= 1084) {
            this.flagForScreens = "mobile";
            let htmlObjectArray = [document.getElementById("cities-regions"), document.getElementById("offices-bank")];
            htmlObjectArray.forEach((htmlObject, ind) => {
                Array.from(htmlObject.children).forEach((elm, index) => {
                    if (index == 0) {
                        elm.remove();
                        let newSelect = document.createElement('select');
                        newSelect.setAttribute("class", "db");
                        // newSelect.setAttribute("name", "city");
                        //newSelect.setAttribute("style", "border-radius: 6px;");
                        let opt = document.createElement('option');
                        opt.value = "Выберите офис";
                        opt.text = "Выберите офис";
                        newSelect.appendChild(opt);
                        htmlObject.appendChild(newSelect);
                    } else {
                        elm.remove();
                    }
                });
            });
            
            // console.log("Мы в мобильном экране = ", htmlObject.children.length);
        }
    }
    
    CurrensyData.prototype.ymapsInit = function() {
        return new Promise (async (resolve, reject) => {
        ymaps.ready(init);
        let self = this;
        
        const fetchUserLocation = async () => {
            const geolocation = ymaps.geolocation;

            const result = await geolocation.get({
                provider: 'auto'
            });
            
            console.log("Уточнение работы геолокации Яндекса = ", result.geoObjects.get(0).geometry.getCoordinates());
            userCoordinates = result.geoObjects.get(0).geometry.getCoordinates();
            console.log("Уточнение работы геолокации Яндекса = ", result.geoObjects.position);
            return userCoordinates;
        }
        
//        let userLock = await fetchUserLocation();
//        await self.requestToApi(result.geoObjects.position);
   
        async function init() {
            
            let userLock = await fetchUserLocation();
            await self.requestToApi(userLock);
            let dict = self.createAllDictioneryOffices();
            console.log("Собираем коллекцию пинов все = ", dict, self.closestOfficeData);
            self.myMap = new ymaps.Map("map", { 
                                    center: userLock, 
                                    zoom: 12,
                                    controls: ['zoomControl']
                    });
                    
            let cityOffices = dict.get(self.closestOfficeData.city);
            
            const defaultPinImage = '/img/marker.png'; // Стандартное изображение
            const highlightedPinImage = '/img/icons/orangePin.svg'; // Выделенное изображение
                
            self.myCollection = new ymaps.GeoObjectCollection();
            self.myClusterer = new ymaps.Clusterer(
                {clusterDisableClickZoom: false}
            );
            
            cityOffices.forEach(item => {
                let [label, id, latitude, longitude] = item;
                const coordinates = [latitude, longitude];
               
                let HintLayout = ymaps.templateLayoutFactory.createClass( "<div class='my-hint'>" +
                    "<b>{{ properties.name }}</b>" +
                    "</div>", {
                        getShape: function () {
                            var el = this.getElement(),
                                result = null;
                            if (el) {
                                var firstChild = el.firstChild;
                                const rect = document.getElementById("map").getBoundingClientRect();
//                                console.log(window.screen.width - 600 + firstChild.offsetWidth);
                                let leftOffWidth = window.innerWidth - rect.left.toFixed() - rect.width + firstChild.offsetWidth;
                                let bottomOffWidth = window.innerHeight - rect.top.toFixed() - rect.height + firstChild.offsetHeight;
                                result = new ymaps.shape.Rectangle(
                                    new ymaps.geometry.pixel.Rectangle([
                                        [0, 0],
                                        [leftOffWidth, bottomOffWidth]
                                    ])
                                );
                            }
                            return result;
                        }
                    }
                );
        
                const placemark = new ymaps.Placemark(coordinates, {
                    id: id,
                    name: label.replace("ДО ", '')
                }, {
                    iconLayout: 'default#image',
                    iconImageHref: defaultPinImage,
                    iconImageSize: [37, 43],
                    iconImageOffset: [-18, -42],
                    hintLayout: HintLayout
                });
                
                placemark.events.add('click', async function(evt) {
                    const targetPlacemark = evt.get('target');
                    console.log(targetPlacemark);

                    const officeId = targetPlacemark.properties.get('id');
                    const officeName = targetPlacemark.properties.get('name');
                    console.log("После клика проверяем id = ", officeId);
                   
                    self.createListnersOffice(officeName, officeId);

                    // Изменение иконки пина на выделенную
                    placemark.options.set('iconImageHref',
                        highlightedPinImage); // Устанавливаем выделенный пин
                    placemark.options.set('iconImageSize', [37, 43]);
                    
                    if (officeId == "274" || officeId == "786") {
                        console.log("Внтри кластера!");
                        self.myClusterer.options.set('preset', 'islands#invertedPinkClusterIcons');
                    } else {
                        self.myClusterer.options.set('preset', 'default#image');
                    }

                    // Можно добавить логику, чтобы другие пины возвращались к стандартному состоянию
                    self.myCollection.each(function(existingPlacemark) {
                        if (existingPlacemark !== placemark) {
                            existingPlacemark.options.set('iconImageHref',
                                defaultPinImage
                            ); // Возвращаем стандартное изображение
                        }
                    });
                    document.querySelectorAll(".db")[1].value = label.replace("ДО ", '');
                });
//                placemark.properties.set('hintContent', label);
//                placemark.properties.set('hintLayout', HintLayout);
                if (id != 274 && id != 786) {
                    self.myCollection.add(placemark);
                } else {
//                    self.myCollection.add(placemark);
                    console.log("Добавили кластер");
                    self.myClusterer.add(placemark);
                }
                //self.myCollection.add(placemark);

            });

            self.myMap.geoObjects.add(self.myCollection);
            self.myMap.geoObjects.add(self.myClusterer);
            console.log("Координаты коллекции яндекса длина = ", self.myCollection.getLength());
            
            

            self.myMap.setBounds(self.myCollection.getBounds());
//            console.log("Самый Ближайший офис = ", self.closestOfficeData);
            self.myMap.setCenter([self.closestOfficeData.latitude, self.closestOfficeData.longitude]);
            self.myMap.setZoom(12);
            
                
//                self.myMap.zoomRange.get(self.myMap.getCenter()).then(zoomRange => {
//                    if (self.myMap.getZoom() > zoomRange[1]) {
//                        self.myMap.setZoom(zoomRange[1]);
//                    }
//                });


        }
        resolve();
        });
    }
    
    CurrensyData.prototype.ymapsNewDraw = async function(city) {
        let self = this;
        
        const fetchUserLocation = async () => {
            const res = await ymaps.geocode(city);
            console.log("Координаты города по названию = ", res.geoObjects.get(0).geometry.getCoordinates());
            return res.geoObjects.get(0).geometry.getCoordinates();
        }
        
        let data = await fetchUserLocation();
        console.log("Геолокация города = ", data);
        
        
        let cityOffices = this.allDictCityOffices.get(city);
        const defaultPinImage = '/img/marker.png'; // Стандартное изображение
        const highlightedPinImage = '/img/icons/orangePin.svg'; // Выделенное изображение
        
        
        
        let arrIdFromCity = Array();
        
        if (self.myCollection) {
            for (var i = 0; i < self.myCollection.getLength(); i++) {
                arrIdFromCity.push(self.myCollection.get(i).properties.get('id'));
            }
        }
        
        if (self.myClusterer) {
            self.myClusterer.getGeoObjects().forEach((elm, ind) => {
                arrIdFromCity.push(elm.properties.get('id'));
            });
        }
        
        cityOffices.forEach(item => {
            if (!(arrIdFromCity.includes(item[1]))) {
                let [label, id, latitude, longitude] = item;
                const coordinates = [latitude, longitude];

                let HintLayout = ymaps.templateLayoutFactory.createClass( "<div class='my-hint'>" +
                    "<b>{{ properties.name }}</b>" +
                    "</div>", {
                        getShape: function () {
                            var el = this.getElement(),
                                result = null;
                            if (el) {
                                var firstChild = el.firstChild;
                                const rect = document.getElementById("map").getBoundingClientRect();
//                                console.log(window.screen.width - 600 + firstChild.offsetWidth);
                                let leftOffWidth = window.innerWidth - rect.left.toFixed() - rect.width + firstChild.offsetWidth;
                                let bottomOffWidth = window.innerHeight - rect.top.toFixed() - rect.height + firstChild.offsetHeight;
                                result = new ymaps.shape.Rectangle(
                                    new ymaps.geometry.pixel.Rectangle([
                                        [0, 0],
                                        [leftOffWidth, bottomOffWidth]
                                    ])
                                );
                            }
                            return result;
                        }
                    }
                );

                const placemark = new ymaps.Placemark(coordinates, {
                    id: id,
                    name: label.replace("ДО ", '')
                }, {
                    iconLayout: 'default#image',
                    iconImageHref: defaultPinImage,
                    iconImageSize: [37, 43],
                    iconImageOffset: [-18, -42],
                    hintLayout: HintLayout
                });
                
                placemark.events.add('click', async function(evt) {
                    const targetPlacemark = evt.get('target');
                    console.log(targetPlacemark);

                    const officeId = targetPlacemark.properties.get('id');
                    const officeName = targetPlacemark.properties.get('name');
                    console.log("После клика проверяем id = ", officeId);
                   
                    self.createListnersOffice(officeName, officeId);

                    

                    // Закрываем балун, если он открывался
//                    self.myMap.balloon.close();

                    // Изменение иконки пина на выделенную
                    placemark.options.set('iconImageHref', highlightedPinImage);
                    placemark.options.set('iconImageSize', [37, 43]);
                    
                    if (officeId == 274 || officeId == 786) {
                        console.log("Внтри кластера!");
                        self.myClusterer.options.set('preset', 'islands#invertedPinkClusterIcons');
                    } else {
                        self.myClusterer.options.set('preset', 'default#image');
                    }

                    // Можно добавить логику, чтобы другие пины возвращались к стандартному состоянию
                    self.myCollection.each(function(existingPlacemark) {
                        if (existingPlacemark !== placemark) {
                            existingPlacemark.options.set('iconImageHref',
                                defaultPinImage
                            ); // Возвращаем стандартное изображение
                        }
                    });
                    document.querySelectorAll(".db")[1].value = label.replace("ДО ", '');
                });
//                placemark.properties.set('hintContent', label);
//                placemark.properties.set('hintLayout', HintLayout);

                if ((id != 274 && id != 786)) {
                    self.myCollection.add(placemark);
                } else {
//                    self.myCollection.add(placemark);
                    console.log("Добавили кластер");
                    self.myClusterer.add(placemark);
                }
//                self.myCollection.add(placemark);
            }
            });
            
        self.myMap.geoObjects.add(self.myCollection);
        console.log("Координаты яндекса длина = ", this.myMap.geoObjects.getLength());
        this.myMap.setCenter(data);
        this.myMap.setZoom(12);
        self.changePinOnMap(self.closestOfficeData.office_id);
    }
    
    CurrensyData.prototype.parseCurrencies = function(result) {
//        let currencyBlock = document.querySelectorAll(".first-currency-show-nal");
//        console.log("from options this = ", officeID );
//        currencyBlock.forEach((elm, ind) => {
//            if (ind != 0) {
//                elm.remove();
//            }
//        });
        let parentCurrency  = document.querySelectorAll('.currency-list-block')[0];
        let childCurrency = document.getElementById("example-curr");
        
        let sortOrder = ['USD', 'EUR', 'CNY', 'CHF', 'GBP', 'AED'];
        let sortedResult = [];
        let sortedResultAtEnd = [];
        
        sortOrder.forEach((elm, ind) => {
            let adding = result.filter(x => x.currency_to == elm);
//            console.log("проверяем adding = ", adding);
            if (adding.length > 0) {
                adding.forEach((elmnt, index) => {
                    if (elmnt.currency_from == "RUR") {
                        sortedResult.push(elmnt);
                    } else {
                        sortedResultAtEnd.push(elmnt);
                        
                    }
                });
            }
        });
        result.forEach((el, ind) => {
            if (!(sortOrder.includes(el.currency_to))) {
                sortedResult.push(el);
            }
        });
        sortedResultAtEnd.forEach((elm, ind) => {
            sortedResult.push(elm);
//            console.log("Кросс курс = ", elm);
        });
        
        
        sortedResult.forEach((el, ind) => {
            let flag = false;
            if (parseFloat(el.sum_sale) != 0 || parseFloat(el.sum_buy) != 0) {
                if (el.currency_from == "RUR" || el.currency_to == "EUR") {
                    flag = true;
                }
                
            }
            if (flag) {
                let clone = childCurrency.cloneNode(true);
                let flag = this.flagsFromApi.filter(x => x.code_iso_alph == el.currency_to);
    //            console.log("Отрисовка флапгов = ", flag[0].icon);
                clone.id = "";
                clone.classList.remove("first-currency-none");
                clone.classList.add("first-currency-show");
                clone.classList.add("first-currency-show-nal");
                let pathToIcon = el.currency_from == "RUR" ? "/img/icons/flags/" + flag[0].icon : "/img/icons/cross-rate.svg";
                let labelCur = el.currency_from == "RUR" ? el.currency_to : el.currency_to + " / " + el.currency_from;
                let labelname = el.currency_from == "RUR" ? flag[0].label : flag[0].label + " / доллар США";
                clone.children[0].innerHTML = '<img class="flag-src" src="' + pathToIcon + '" alt="" srcset=""><span class="flag-name">' +  labelCur + '</span>';
                clone.children[1].innerHTML = '<span class="flag-name">' +  labelname + '</span>';
    //            clone.children[0].innerHTML = el.currency_to;
                let strV = el.sum_buy.substring(el.sum_buy.length -2 ,el.sum_buy.length) == "00" ? el.sum_buy.substring(0, el.sum_buy.length -2) : el.sum_buy;
                clone.children[2].innerHTML = strV;
                console.log("проверка нулей = ", el.sum_buy.substring(el.sum_buy.length -2 ,el.sum_buy.length)=="00");
                strV = el.sum_sale.substring(el.sum_sale.length -2 ,el.sum_sale.length) == "00" ? el.sum_sale.substring(0, el.sum_sale.length -2) : el.sum_sale;
                clone.children[3].innerHTML = strV;
                parentCurrency.appendChild(clone);
            }
        });
        
        let arrayConver = result.filter(x => x.currency_from == "RUR");
        arrayConver = arrayConver.filter(x => parseFloat(x.sum_sale) != 0 || parseFloat(x.sum_buy) != 0);
        this.converter.init(arrayConver);
    }
        
    CurrensyData.prototype.requestToApi = async function(position) {

            let checkPosition = [parseFloat(position[0]), parseFloat(position[1])];
            let currencyBlock = document.querySelectorAll(".first-currency-show-nal");

            currencyBlock.forEach((elm, ind) => {
                if (ind != 0) {
                    elm.remove();
                }
            });
//            let url = "./apidb.php";
//            let dataToSend = {'data': "hello world"};
//            const request = new Request(url, {
//                                method: "POST",
//                                headers: {
//                                            'Content-Type': 'application/json;charset=utf-8',
//                                        },
//                                body: JSON.stringify(dataToSend)
//                                });
//            try {
//                const response = await fetch(request);  
//                if (!response.ok) {
//                    throw new Error(`Response status: ${response.status}`);
//                }
//                const data = await response.json();
//                this.dataFromApi = data.data;
//                this.dataFromApi.sort((a, b) => a.city.localeCompare(b.city));
//                this.flagsFromApi = data.flags;
//                this.createAllDictioneryOffices();
                let closestOffice = this.dataFromApi.reduce(function(prev, curr) {
                    let data1 = Math.sqrt( Math.pow((parseFloat(prev.latitude) - checkPosition[0]) ,2) + Math.pow((parseFloat(prev.longitude) - checkPosition[1]),2) );
                    let data2 = Math.sqrt( Math.pow((parseFloat(curr.latitude) - checkPosition[0]),2) + Math.pow((parseFloat(curr.longitude) - checkPosition[1]),2) );
                    return (Math.abs(data2) < Math.abs(data1) ? curr : prev);
                });

                let result = this.dataFromApi.filter(x => x.office_id == closestOffice.office_id);

                this.closestOfficeData = closestOffice;
                this.parseCurrencies(result);
                this.changeCitiesOffices(closestOffice);
                document.querySelectorAll(".db")[0].value = closestOffice.city == "Москва" ? "Москва и Московская обл." : closestOffice.city;
                document.querySelectorAll(".db")[1].value = closestOffice.label_web.replace("ДО ", '');
                document.getElementById("office-name").innerHTML = closestOffice.label_web.replace("ДО ", '') + ", " + closestOffice.address_web_1;
                this.createListnersCities(closestOffice.city, "map");
                document.querySelectorAll(".db")[1].value = closestOffice.label_web.replace("ДО ", '');
                console.log("Должен установиться офис = ", document.querySelectorAll(".db")[1]);
                document.getElementById("office-name").innerHTML = closestOffice.label_web.replace("ДО ", '') + ", " + closestOffice.address_web_1;
//                this.changePinOnMap(closestOffice.id);
//            }
//            catch(error) {
//                console.log(error.message);
//            }
//            console.log("hello yandex");
    } 
    
    CurrensyData.prototype.requestToApiFirst = async function(position) {

            let checkPosition = [parseFloat(position[0]), parseFloat(position[1])]; 
            let url = "./apidb.php";
            let dataToSend = {'data': "hello world"};
            const request = new Request(url, {
                                method: "POST",
                                headers: {
                                            'Content-Type': 'application/json;charset=utf-8',
                                        },
                                body: JSON.stringify(dataToSend)
                                });
            try {
                const response = await fetch(request);  
                if (!response.ok) {
                    throw new Error(`Response status: ${response.status}`);
                }
                const data = await response.json();
                this.dataFromApi = data.data;
                this.dataFromApi.sort((a, b) => a.city.localeCompare(b.city));
                this.flagsFromApi = data.flags;
                this.createAllDictioneryOffices();
                let closestOffice = this.dataFromApi.reduce(function(prev, curr) {
                    let data1 = Math.sqrt( Math.pow((parseFloat(prev.latitude) - checkPosition[0]) ,2) + Math.pow((parseFloat(prev.longitude) - checkPosition[1]),2) );
                    let data2 = Math.sqrt( Math.pow((parseFloat(curr.latitude) - checkPosition[0]),2) + Math.pow((parseFloat(curr.longitude) - checkPosition[1]),2) );
                    return (Math.abs(data2) < Math.abs(data1) ? curr : prev);
                });
                console.log("from api result ближайший офис = ", checkPosition);
                console.log("список валют = ", closestOffice);
                let result = this.dataFromApi.filter(x => x.office_id == closestOffice.office_id);
                console.log(" валюты  from api result = ", result);
//                console.log("from api result город = ", result);
                this.closestOfficeData = closestOffice;
                this.parseCurrencies(result);
                this.changeCitiesOffices(closestOffice);
                document.querySelectorAll(".db")[0].value = closestOffice.city == "Москва" ? "Москва и Московская обл." : closestOffice.city;
                document.querySelectorAll(".db")[1].value = closestOffice.label_web.replace("ДО ", '');
                document.getElementById("office-name").innerHTML = closestOffice.label_web.replace("ДО ", '') + ", " + closestOffice.address_web_1;
                this.createListnersCities(closestOffice.city, "map");
                document.querySelectorAll(".db")[1].value = closestOffice.label_web.replace("ДО ", '');
                document.getElementById("office-name").innerHTML = closestOffice.label_web.replace("ДО ", '') + ", " + closestOffice.address_web_1;
//                this.changePinOnMap(closestOffice.id);
            }
            catch(error) {
                console.log(error.message);
            }
            console.log("hello yandex");
    }
    
    
    
    CurrensyData.prototype.createAllDictioneryOffices = function() {
        let listOfCities = [...new Set(Array.from(this.dataFromApi, x => x.city))];
        listOfCities = listOfCities.filter(x => x != null);
        let listOfOffices = [...new Set(Array.from(this.dataFromApi, x => x.label_web))];

        this.dataFromApi.forEach((elm, ind) => {
            if (elm.city != null) {
            if (!(this.allDictCityOffices.has(elm.city))) {

                let arr = [];
                arr.push([elm.label_web, elm.office_id, elm.latitude, elm.longitude, elm.address_web_1]);
                this.allDictCityOffices.set(elm.city, arr);
//                if (elm.city == 'Владивосток') console.log("Владивосток", this.allDictCityOffices.get('Владивосток'));
            } else {

                let arr = this.allDictCityOffices.get(elm.city);
//                if (elm.city == 'Владивосток') console.log("Владивосток", arr);
                let arr1 = [];
                arr.forEach((elm, ind) => {
                    arr1.push(elm[1]);
                });

                if (!(arr1.includes(elm.office_id))) {
                    arr.push([elm.label_web, elm.office_id, elm.latitude, elm.longitude, elm.address_web_1]);
                    this.allDictCityOffices.set(elm.city, arr);
                }

            }
        }
        });
        let sortedDict = new Map();
        
        this.allDictCityOffices.forEach((value, key) => {
            value.sort((a, b) => a[0].localeCompare(b[0]));
            this.allDictCityOffices.set(key, value);
        });
        console.log("Проверяем словарь всех = ", this.allDictCityOffices);
        return this.allDictCityOffices;
    }
    
    CurrensyData.prototype.changeCitiesOffices = function(closestOffice) {
        let currentOfficesInTheCity = this.dataFromApi.filter(x => x.city == closestOffice.city);
        let listOfCities = [...new Set(Array.from(this.dataFromApi, x => x.city))];
        listOfCities = listOfCities.filter(x => x != null);
        let listOfOffices = [...new Set(Array.from(this.dataFromApi, x => x.label_web))];

        this.dataFromApi.forEach((elm, ind) => {
            if (elm.city != null) {
            if (!(this.dictCityOffices.has(elm.city))) {

                let arr = [];
                arr.push([elm.label_web, elm.office_id, elm.latitude, elm.longitude, elm.address_web_1]);
                this.dictCityOffices.set(elm.city, arr);
//                if (elm.city == 'Владивосток') console.log("Владивосток", this.dictCityOffices.get('Владивосток'));
            } else {

                let arr = this.dictCityOffices.get(elm.city);
//                if (elm.city == 'Владивосток') console.log("Владивосток", arr);
                let arr1 = [];
                arr.forEach((elm, ind) => {
                    arr1.push(elm[1]);
                });

                if (!(arr1.includes(elm.office_id))) {
                    arr.push([elm.label_web, elm.office_id, elm.latitude, elm.longitude, elm.address_web_1]);
                    this.dictCityOffices.set(elm.city, arr);
                }

            }
        }
        });
        
        this.dictCityOffices.forEach((value, key) => {
            value.sort((a, b) => a[0].localeCompare(b[0]));
            this.dictCityOffices.set(key, value);
        });

        console.log("Кол-во офисов в горое = ", listOfCities.length, listOfCities[5], this.dictCityOffices.get(listOfCities[5]));

        const change = (id, dataList) => {
            let citiesFieldLink = document.querySelectorAll(".db")[id];
            // let citiesDataLink = document.querySelectorAll(".db-datalist")[id];
            let citiesDataLink = this.flagForScreens == "desctop" ? document.querySelectorAll(".db-datalist")[id] : citiesFieldLink;

            let options = citiesDataLink.children;
            var i, L = options.length - 1;
            for(i = L; i >= 0; i--) {
               options[i].remove();
            }
            if (id == 1) {
                dataList.forEach((el, ind) => {
                    let option = document.createElement('option');
                    option.value = el + " Адрес";
                    option.text = el + " Адрес";
                    citiesDataLink.appendChild(option);
                    
//                    let optionAddress = document.createElement('option');
//                    optionAddress.value = el + " Адрес";
//                    optionAddress.text = el + " Адрес";
////                    optionAddress.disabled = true;
//                    citiesDataLink.appendChild(optionAddress);
//                    console.log("Вставка адреса = ", optionAddress);
                });
            } else {
                dataList.forEach((el, ind) => {
//                    let data = el;
                    let option = document.createElement('option');
                    let data = el == "Москва" ? "Москва и Московская обл." : el;
//                    if (el == "Москва") { 
//                        data = "Москва и Московская область";
//                    }
                    option.value = data;
                    option.text = data;
                    citiesDataLink.appendChild(option);
                });
            }
            
        }
        change(0, listOfCities);
        change(1, listOfOffices);

//            this.initSettings("cities");
        this.settingsOnClickCities();
    }
        
    CurrensyData.prototype.createListnersCities = function(city, from) {
        console.log("Проверяем слушатель событий Города");
        let fieldLinkMobile = document.querySelectorAll(".db")[1];
        //let citiesDataLink = document.querySelectorAll(".db-datalist")[1];
        let citiesDataLink = this.flagForScreens == "desctop" ? document.querySelectorAll(".db-datalist")[1] : fieldLinkMobile;
        let arr = this.dictCityOffices.get(city);
        let arr1 = Array.from(arr, x => [x[0], x[1], x[4]]);

        const exclud = (x) => {
            let excludeOfficess = ["аэ", "авангард-экспресс", "экспресс"];
            let text = x[0].toLowerCase();
            let flag = true;
            excludeOfficess.forEach((el, ind) => {
                if (text.includes(el)) {flag = false;};
            });
            return flag;
        }
        let arr2 = arr.filter(exclud);
        if (arr2.length == 0) {
            arr2 = arr;
        }

        let options = citiesDataLink.children;
        var i, L = options.length - 1;
        for(i = L; i >= 0; i--) {
           options[i].remove();
        }
        arr1.forEach((el, ind) => {
            let option = document.createElement('option');
            let charts = city + ",";
            let addr = el[2].replace(charts, '');
            addr = addr.replace("г.", '');
            addr = addr.replace(" г ", '');
            let nameL = el[0].replace("ДО ", '');
            option.value = nameL + " " + addr;
            option.text = nameL + " " + addr;
            option.dataset.officeid = el[1];
            option.dataset.address = "No";
            citiesDataLink.appendChild(option);

//                let optionAddress = document.createElement('option');
//                optionAddress.value = " Адрес";
//                optionAddress.text = " Адрес  произволный";
//                optionAddress.dataset.address = "Address";
//                optionAddress.setAttribute("disabled", "");
//                citiesDataLink.appendChild(optionAddress);
        });
            
        let id = (city == "Москва") ? 5 : arr2[0][1];
        let result = this.dataFromApi.filter(x => x.office_id == id);
        document.querySelectorAll(".db")[1].value = arr2[0][0].replace("ДО ", '');
        if (city == "Москва") {document.querySelectorAll(".db")[1].value = '"Центральный"';};
        this.settingsOnClickOffices();
        if (from == "tab") {
            let currencyBlock = document.querySelectorAll(".first-currency-show-nal");
//                console.log("from options this = ", officeID );
            currencyBlock.forEach((elm, ind) => {
                if (ind != 0) {
                    elm.remove();
                }
            });
            this.parseCurrencies(result);
            document.getElementById("office-name").innerHTML = result[0].label_web.replace("ДО ", '') + ", " + result[0].address_web_1;
        }
        
        if (from == "tab") {this.ymapsNewDraw(city);}
    }
        
    CurrensyData.prototype.createListnersOffice = function(office, officeID) {
        let currencyBlock = document.querySelectorAll(".first-currency-show-nal");
            console.log("from options this = ", officeID );
            currencyBlock.forEach((elm, ind) => {
                if (ind != 0) {
                    elm.remove();
                }
            });
            let result = this.dataFromApi.filter(x => x.office_id == officeID);
            
            let newCenter = this.changePinOnMap(officeID);
//            console.log("Новый центр newCenter = ", newCenter);
//            this.myMap.setCenter(newCenter);
//            this.myMap.setZoom(12);
            newCenter = (newCenter) ? newCenter : [result[0].latitude, result[0].longitude];
            if (this.myMap) this.myMap.setCenter(newCenter);
            if (this.myMap) this.myMap.setZoom(12);
            this.parseCurrencies(result);
            document.getElementById("office-name").innerHTML = result[0].label_web.replace("ДО ", '') + ", " + result[0].address_web_1;
    }
    
    CurrensyData.prototype.changePinOnMap = function(officeID) {
        //  Меняем пин на активный
        const highlightedPinImage = '/img/icons/orangePin.svg';
        const defaultPinImage = '/img/marker.png';
        let newCenter = [];
        if (this.myCollection) {
            for (var i = 0; i < this.myCollection.getLength(); i++) {
                var geoObject = this.myCollection.get(i);
                if (geoObject instanceof ymaps.Placemark) {

                    if (geoObject.properties.get('id') == officeID) {
                        console.log("Поменяли");
                        this.myCollection.get(i).options.set('iconImageHref', highlightedPinImage);
                        newCenter = this.myCollection.get(i).geometry.getCoordinates();
                        console.log(this.myCollection.get(i).geometry.getCoordinates());
                    } else {
//                        console.log("проверка myClusterer = ", this.myCollection.getClusters());
                        this.myCollection.get(i).options.set('iconImageHref', defaultPinImage);
                        if (this.myClusterer) {
                            this.myClusterer.getGeoObjects().forEach((elm, ind) => {
                                elm.options.set('iconImageHref', defaultPinImage);
                            });

                        }
                    }
    //                  console.log("меняем пин на активный", geoObject.options.get('iconImageHref'));
                }
            }
        }
        
        if (this.myClusterer) {
            this.myClusterer.getGeoObjects().forEach((elm, ind) => {
                if (elm.properties.get('id') == officeID) {
                    newCenter = elm.geometry.getCoordinates();
                }
            });
//            console.log("проверка myClusterer = ", this.myClusterer.getGeoObjects()[0].properties.get('id'));
            console.log("проверка myClusterer = ", this.myClusterer.getClusters());
        }
        
        return newCenter;
    }
        
    CurrensyData.prototype.settingsOnClickOffices = function() {
//        console.log("Проверяем новую клики офисов");
        let fieldLink = document.querySelectorAll(".db")[1];
        // let dataLink = document.querySelectorAll(".db-datalist")[1];
        let dataLink = this.flagForScreens == "desctop" ? document.querySelectorAll(".db-datalist")[1] : fieldLink;
        let self = this;

        fieldLink.onfocus = function () {
                if (self.flagForScreens == "desctop") dataLink.style.display = 'block';
                fieldLink.style.borderRadius = "6px 6px 0 0";  
                if (self.flagForScreens == "desctop") fieldLink.select();
        };

        for (let option of dataLink.options) {
            option.onmousedown = function () {
                    event.preventDefault();
                }
        }

        for (let option of dataLink.options) {
//            console.log("Проверяем новую клики офисов = ", option);
            if (option.dataset.address != "Address") {
                option.onclick = function () {
                console.log("Проверяем новую клики офисов = ", option.value);
                    fieldLink.value = option.value;
                    if (self.flagForScreens == "desctop") dataLink.style.display = 'none';
                    fieldLink.style.borderRadius = "6px";
                    self.createListnersOffice(option.value, option.dataset.officeid);
                    fieldLink.blur();
                    for (let option of dataLink.options) {
                        if (self.flagForScreens == "desctop") option.style.display = "block";
                    };
                }
            }
            
        }
        
        if (self.flagForScreens != "desctop") {
            fieldLink.onchange = function(e) {
                console.log("Нажался Селект 2 = ", e.target.selectedOptions[0].dataset.officeid);
                fieldLink.style.borderRadius = "6px";
                self.createListnersOffice(fieldLink.value, e.target.selectedOptions[0].dataset.officeid);
                fieldLink.blur();
            }
        }
        
        
        fieldLink.oninput = function(e) {
//            if (e.key === "ArrowDown") {
//                console.log("Нажалась кнопка вниз!!!");
//            }
            
            let currentFocus = -1;
            let text = fieldLink.value.toUpperCase();
            for (let option of dataLink.options) {
                if(option.value.toUpperCase().indexOf(text) > -1) {
                    if (self.flagForScreens == "desctop") option.style.display = "block";
                } else {
                    if (self.flagForScreens == "desctop") option.style.display = "none";
                }
            };
         }

        fieldLink.onblur = function (event) {
            if (self.flagForScreens == "desctop") dataLink.style.display = 'none';
            fieldLink.style.borderRadius = "6px 6px 6px 6px";  
            for (let option of dataLink.options) {
                if (self.flagForScreens == "desctop") option.style.display = "block";
            };
        }
        
//        fieldLink.onkeypress = function (e) {
//            e = e || window.event;
//            if (e.key === "ArrowDown") {
//                console.log("Нажалась кнопка вниз!!!");
//            }
//            console.log("Нажалась кнопка вниз!!!");
//        }
    }
        
    CurrensyData.prototype.settingsOnClickCities = function() {
        let fieldLink = document.querySelectorAll(".db")[0];
        let dataLink = this.flagForScreens == "desctop" ? document.querySelectorAll(".db-datalist")[0] : fieldLink;
        let self = this;
        console.log("Проверяем новую клики городов");

        fieldLink.onfocus = function () {
                if (self.flagForScreens == "desctop") fieldLink.select();
                if (self.flagForScreens == "desctop") dataLink.style.display = 'block';
                fieldLink.style.borderRadius = "6px 6px 0 0";  
        };

        for (let option of dataLink.options) {
            option.onmousedown = function () {
                    event.preventDefault();
                }
        }

        let dataAllLinks = [];
        for (let option of dataLink.options) {
            option.onclick = function () {
                let cityName = option.value == "Москва и Московская обл." ? "Москва" : option.value;
                fieldLink.value = option.value;
                if (self.flagForScreens == "desctop") dataLink.style.display = 'none';
                fieldLink.style.borderRadius = "6px";
                self.createListnersCities(cityName, "tab");
                fieldLink.blur();
                for (let option of dataLink.options) {
                    if (self.flagForScreens == "desctop") option.style.display = "block";
                };
            }
        }
        
        if (self.flagForScreens != "desctop") {
            fieldLink.onchange = function() {
                console.log("Нажался Селект");
                let cityName = fieldLink.value == "Москва и Московская обл." ? "Москва" : fieldLink.value;
                //fieldLink.value = option.value;
                if (self.flagForScreens == "desctop") dataLink.style.display = 'none';
                fieldLink.style.borderRadius = "6px";
                self.createListnersCities(cityName, "tab");
                fieldLink.blur();
            }
        }

        fieldLink.oninput = function() {
                let currentFocus = -1;
                let text = fieldLink.value.toUpperCase();
                for (let option of dataLink.options) {
                    if(option.value.toUpperCase().indexOf(text) > -1) {
                        if (self.flagForScreens == "desctop") option.style.display = "block";
                    } else {
                        if (self.flagForScreens == "desctop") option.style.display = "none";
                    }
                };
            }

            fieldLink.onblur = function (event) {
                if (self.flagForScreens == "desctop") dataLink.style.display = 'none';
                fieldLink.style.borderRadius = "6px 6px 6px 6px";  
                for (let option of dataLink.options) {
                    if (self.flagForScreens == "desctop") option.style.display = "block";
                };
            };
    }
    
class Converter {
        ratesInSelect = [];

        constructor(firstSelect, secondSelect, firstInput, secondInput, crossCourseButton) {
            this.firstSelect = firstSelect;
            this.secondSelect = secondSelect;
            this.firstInput = firstInput;
            this.secondInput = secondInput;
            this.crossCourseButton = crossCourseButton;

            // Применяем форматирование на ввод через addEventListener
            this.firstInput.addEventListener("input", this.#handleInput.bind(this, this.firstInput));
            this.secondInput.addEventListener("input", this.#handleInput.bind(this, this.secondInput));

            // Слушатели событий на инпуты
            this.firstInput.addEventListener("input", (evt) => this.#calculateExchange(evt, this.secondInput, this.firstSelect, this.secondSelect));
            this.secondInput.addEventListener("input", (evt) => this.#calculateExchange(evt, this.firstInput, this.secondSelect, this.firstSelect, true));

            // Слушатели событий на селекты
            this.firstSelect.addEventListener("change", () => this.#changeCurrencyInSelect(this.firstSelect, this.secondSelect, this.firstInput, this.secondInput));
            this.secondSelect.addEventListener("change", () => this.#changeCurrencyInSelect(this.secondSelect, this.firstSelect, this.secondInput, this.firstInput));

            // Слушатель на кросс кнопку
            this.crossCourseButton.addEventListener("click", this.#handleClickByCrossButton.bind(this));
        }

        init = (rates) => {
            this.ratesInSelect = this.#getFullRates(rates);

            this.firstInput.value = 0;
            this.secondInput.value = 0;

            // Убедимся, что ratesInSelect существует и имеет элементы
            const firstSelectValue = this.ratesInSelect.find(rate => rate.currency_to === 'RUR')?.currency_to || this.ratesInSelect[0]?.currency_to || 'RUR';
            const secondSelectValue = this.ratesInSelect.find(rate => rate.currency_to === 'USD')?.currency_to ||
                this.ratesInSelect.find(rate => rate.currency_to === 'EUR')?.currency_to ||
                this.ratesInSelect[1]?.currency_to || 'USD';

            // Проверяем, что оба значения существуют
            if (!firstSelectValue || !secondSelectValue) {
                console.error("Недостаточно данных для инициализации селектов.");
                return;
            }

            // Заполняем селекты
            this.#populateSelect(this.firstSelect, this.ratesInSelect, firstSelectValue, secondSelectValue);
            this.#populateSelect(this.secondSelect, this.ratesInSelect, secondSelectValue, firstSelectValue);
        }

        // Обработчик ввода, который форматирует значение инпута
        #handleInput(inputElement) {
            // Форматируем значение
            inputElement.value = this.#formatInputValue(inputElement.value);
        }

        // Метод для форматирования ввода
        #formatInputValue = (inputValue) => {
            // Разрешаем вводить только цифры и точку
            let sanitizedValue = inputValue.replace(/[^0-9.,]/g, '');
            // console.log("Убрал пробелы: ", sanitizedValue);

            // Убираем ведущий ноль, если нет десятичной точки
            if (sanitizedValue.startsWith("0") && sanitizedValue.length > 1 && sanitizedValue[1] !== ".") {
                sanitizedValue = sanitizedValue.slice(1); // Убираем только ведущий 0, если нет точки
            }

            // Убираем лишние точки, если их несколько
            const pointCount = (sanitizedValue.match(/\./g) || []).length;
            if (pointCount > 1) {
                sanitizedValue = sanitizedValue.slice(0, sanitizedValue.lastIndexOf('.')) + sanitizedValue.slice(sanitizedValue.lastIndexOf('.')).replace(/\./g, '');
            }

            // Преобразуем строку в число
            const val = parseFloat(sanitizedValue.replace(',', '.')) || 0; // Если строка пустая или некорректна, используем 0
            // console.log("Приведение к числу: ", val);

            const formattedNumber = new Intl.NumberFormat('ru-RU', {
                maximumFractionDigits: 2
            }).format(val);
            // console.log("Форматирует число: ", formattedNumber);

            return formattedNumber;
        };

        #getFullRates = (rates) => {
            console.log('Актуальные курсы', rates);

            const currencyArray = [{
                    "currency_from": "RUR",
                    "currency_to": "RUR",
                    "sum_buy": "1",
                    "sum_sale": "1",
                    "icon": "826_gb.svg"
                },
                ...rates
            ];

            return currencyArray;
        }

        #populateSelect = (select, data, defaultOption, excludeValue) => {
            select.innerHTML = ""; // Очищаем предыдущие опции

            data.forEach((item) => {
                if (item.currency_to !== excludeValue) {
                    const option = document.createElement("option");
                    option.value = item.currency_to;
                    option.textContent = item.currency_to;
                    option.dataset.sumBuy = item.sum_buy;
                    option.dataset.sumSale = item.sum_sale;
                    select.appendChild(option);
                } else {
                    // console.log(`Удалил значение: ${excludeValue} в селекте `, select);
                }
            });

            select.value = defaultOption;
        }

        // Функция для расчёта кросс-курса
        #calcConvertedAmount(firstInput, secondInput, selectedOptionFrom, selectedOptionTo, reverse) {
            const formattedNumber = firstInput.value.replace(/[^0-9.,]/g, '');
            // console.log("Убрал пробелы: ", formattedNumber);

            const amount = parseFloat(formattedNumber.replace(',', '.'));
            const fromRate = parseFloat(reverse ? selectedOptionFrom.dataset.sumSale : selectedOptionFrom.dataset.sumBuy);
            const toRate = parseFloat(reverse ? selectedOptionTo.dataset.sumBuy : selectedOptionTo.dataset.sumSale);
            // console.log("Привел к числу: ", amount);

            // Кросс-курс 
            const crossCourse = fromRate / toRate;
            // console.log(`${fromRate} / ${toRate} = ${crossCourse}`);

            if (!isNaN(amount) && !isNaN(crossCourse)) {
                // Перевод через базовую валюту (например, RUR)
                const convertedAmount = amount * crossCourse;

                const formattedAmount = new Intl.NumberFormat('ru-RU', {
                    maximumFractionDigits: 2
                }).format(convertedAmount);

                secondInput.value = formattedAmount;
            } else {
                secondInput.value = 0;
            }
        }

        // Функция для расчёта обмена
        #calculateExchange(evt, secondInput, selectFrom, selectTo, reverse = false) {
            const target = evt.target;
            const selectedOptionFrom = selectFrom.options[selectFrom.selectedIndex];
            const selectedOptionTo = selectTo.options[selectTo.selectedIndex];

            if (!selectedOptionFrom || !selectedOptionTo || !target.value) {
                secondInput.value = "";
                return;
            }

            // Подсчет валют
            this.#calcConvertedAmount(target, secondInput, selectedOptionFrom, selectedOptionTo, reverse);
        }

        #changeCurrencyInSelect(selectFrom, selectTo, inputFrom, inputTo) {
            const selectedFrom = selectFrom.options[selectFrom.selectedIndex];
            const selectedTo = selectTo.options[selectTo.selectedIndex];

            // Заполняем первый селект, исключая выбранное значение из второго
            this.#populateSelect(selectFrom, this.ratesInSelect, selectedFrom.value, selectedTo.value);

            // Заполняем второй селект, исключая выбранное значение из первого
            this.#populateSelect(selectTo, this.ratesInSelect, selectedTo.value, selectedFrom.value);

            // Подсчет валют
            this.#calcConvertedAmount(inputFrom, inputTo, selectedFrom, selectedTo);
        }

        #handleClickByCrossButton() {
            const selectedFrom = this.firstSelect.options[this.firstSelect.selectedIndex];
            const selectedTo = this.secondSelect.options[this.secondSelect.selectedIndex];

            // Заполняем первый селект, исключая выбранное значение из второго
            this.#populateSelect(this.firstSelect, this.ratesInSelect, selectedTo.value, selectedFrom.value);
            this.#populateSelect(this.secondSelect, this.ratesInSelect, selectedFrom.value, selectedTo.value);

            // После обновления селектов, читаем новые выбранные значения
            const updatedFromOption = this.firstSelect.options[this.firstSelect.selectedIndex];
            const updatedToOption = this.secondSelect.options[this.secondSelect.selectedIndex];

            // Подсчет валют
            this.#calcConvertedAmount(this.firstInput, this.secondInput, updatedFromOption, updatedToOption);
        }
    }
    
    $(document).ready(function () {
        
        
        // конвертор
        
        const currFromSelect = document.getElementById('curr-from-select');
        const currToSelect = document.getElementById('curr-to-select');
        const currFromInput = document.getElementById('curr-from-input');
        const currToInput = document.getElementById('curr-to-input');
        const crossCourseButton = document.querySelector('#cross-course-button');

        const currencyArray = [{
                "currency_from": "RUR",
                "currency_to": "USD",
                "sum_buy": "104.5000",
                "sum_sale": "109.5000",
                "icon": "840_us.svg"
            },
            {
                "currency_from": "RUR",
                "currency_to": "GBP",
                "sum_buy": "122.0000",
                "sum_sale": "137.0000",
                "icon": "826_gb.svg"
            }
        ];

        const currencyArray2 = [{
                "currency_from": "RUR",
                "currency_to": "USD",
                "sum_buy": "104.5000",
                "sum_sale": "109.5000",
                "icon": "840_us.svg"
            },
            {
                "currency_from": "RUR",
                "currency_to": "GBP",
                "sum_buy": "122.0000",
                "sum_sale": "137.0000",
                "icon": "826_gb.svg"
            },
            {
                "currency_from": "RUR",
                "currency_to": "BLG",
                "sum_buy": "150.0000",
                "sum_sale": "160.0000",
                "icon": "860_gb.svg"
            }
        ];

        const converter = new Converter(currFromSelect, currToSelect, currFromInput, currToInput, crossCourseButton);

        //
        
        let obj = new CurrensyData(converter);
    });
    
</script>
<script type="text/javascript">
    $(document).ready(function () {
        let allPhotosField = document.querySelectorAll('.change-option');
        let mapWrap = document.getElementById("map-wrap");
        let mapElem = document.getElementById("map");
        
        allPhotosField.forEach((el, index) => {
            el.onclick = () => {
                allPhotosField.forEach((ht, ind) => {
                    ht.classList.toggle("change-option-active");
                });
                mapWrap.classList.toggle("map-visibility-new");
                mapElem.classList.toggle("map-Yandex-Exact-dsp");
            }
        });
    });
</script>
<script type="text/javascript">
</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
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
}
.right-column {
    width: 670px !important;
    padding-left: 0 !important;
    padding-right: 0 !important;
}
.map-Yandex-Size {
    width: 90%;
    height: 525px;
    margin-bottom: 20px;
    z-index: 10;
}
.map-Yandex-Exact-Size {
    z-index: 10;
    width: 100%;
    height: 525px;
}
.map-Yandex-Exact-dsp {
    display: none;
}
.map-visibility-1 {
    display: none;
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
    height: 15px;
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
    z-index: 1;
}
option {
    background-color: white;
    padding: 4px;
    color: rgb(88, 88, 88);
    margin-bottom: 1px;
    font-size: 10px;
    cursor: pointer;
}

option:hover,  .active{
    background-color: lightblue;
}
.controller-block {
    display: flex;
    position: relative;
    align-items: center;
    justify-content: space-between;
    flex-direction: row;
    width: 90% !important;
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
    border: 0.2px solid gray;
    display: flex;
    position: relative;
    flex-direction: column;
    align-items: flex-start;
    justify-content: left;
}
.currency-element {
    display: flex;
    position: relative;
    width: 70%;
    height: 25px;
    border: 0.2px solid gray;  
    flex-direction: row;
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
    width: 33.3%;
    height: 100%;
    border: 0.2px solid gray; 
}
</style>
<script src="https://api-maps.yandex.ru/2.1/?apikey=a0a0b5ec-c142-4ea8-b8e6-ae69a5859bef&lang=ru_RU&load=package.full"></script>
<div class="rectangle_1">
        <h1 class="like-h1">Обмен валют</h1>
        <p> 
            Для вас доступен спектр услуг по обмену валют, который гарантирует комфорт и безопасность ваших финансовых операций. 
            Обменять валюту можно как за наличные, так и безналичным способом через наш сайт или мобильное приложение. 
        </p>
    </div>

<div class="rectangle_2">
    <h1 class="like-h1 h1-kursy">Курсы валют в офисах</h1>
    <p class="p-kursy">Действительно на 12:19, 08.11.2024</p>
    <div class="controller-block">
        <div class="controller-item">
            <p class="p-class">Город</p>
            <div class="db-item">
                <input class="db" autocomplete="off" role="combobox" list="" id="" name="city" placeholder="Выберите город" >
                <datalist class="db-datalist" id="" role="listbox">
                    <option value="Москва">Москва</option>
                    <option value="Казань">Казань</option>
                </datalist>
            </div>
        </div>
        <div class="controller-item">
            <p class="p-class">Офис</p>
            <div class="db-item">
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
    <div id="map-wrap" class="map-Yandex-Size map-visibility-1">
        <div id="map" class="map-Yandex-Exact-Size map-Yandex-Exact-dsp"></div>
    </div>
    <div class='currency-list-block'>
        <div class='currency-element first-currency-show'>
            <div class="currency-element-block"></div>
            <div class="currency-element-block">Покупка</div>
            <div class="currency-element-block">Продажа</div>
        </div>
        <div id="example-curr" class='currency-element first-currency-none'>
            <div class="currency-element-block"></div>
            <div class="currency-element-block"></div>
            <div class="currency-element-block"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        const parseCurrencies = (result) => {
            let parentCurrency  = document.querySelectorAll('.currency-list-block')[0];
            let childCurrency = document.getElementById("example-curr");
            result.forEach((el, ind) => {
                let clone = childCurrency.cloneNode(true);
                clone.id = "";
                clone.classList.remove("first-currency-none");
                clone.classList.add("first-currency-show");
                clone.children[0].innerHTML = el.currency_to;
                clone.children[1].innerHTML = el.sum_buy;
                clone.children[2].innerHTML = el.sum_sale;
                parentCurrency.appendChild(clone);
            });
        }
        
        const requestToApi = async (position) => {
//            let url = new URL("./rus/private/currtest2/db.php");
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
                let closestOffice = data.data.reduce(function(prev, curr) {
                    let data1 = Math.sqrt( Math.pow((parseFloat(prev.latitude) - checkPosition[0]) ,2) + Math.pow((parseFloat(prev.longitude) - checkPosition[1]),2) );
                    let data2 = Math.sqrt( Math.pow((parseFloat(curr.latitude) - checkPosition[0]),2) + Math.pow((parseFloat(curr.longitude) - checkPosition[0]),2) );
                   
                    return (Math.abs(data2) < Math.abs(data1) ? curr : prev);
                });
                console.log("from api result = ", checkPosition);
                console.log("from api result = ", closestOffice);
                let result = data.data.filter(x => x.office_id == closestOffice.office_id);
                console.log("from api result = ", result);
                parseCurrencies(result);
            }
            catch(error) {
                console.log(error.message);
            }
            console.log("hello yandex");
        } 
        
        ymaps.ready(init);
        function init() {
            var geolocation = ymaps.geolocation;
            
            geolocation.get({
                provider: 'yandex',
                mapStateAutoApply: false,
            }).then(function(result) {
                // result.geoObjects.options.set('preset', 'islands#redCircleIcon');
                result.geoObjects.options.set('iconImageHref', '/img/icons/pin-1.png');
				result.geoObjects.options.set('iconImageSize', [40, 48]);
                result.geoObjects.get(0).properties.set({
                    balloonContentBody: 'Мое местоположение'
                });
                myMap.geoObjects.add(result.geoObjects);
                console.log(result.geoObjects.position);
                requestToApi(result.geoObjects.position);
            });

            
            var myMap = new ymaps.Map("map", { 
                                        center: [55.741206, 37.614267], 
                                        zoom: 12 
                        });
                        //           myMap.controls.add("zoomControl").add("typeSelector");
                        //var myPlacemark = new ymaps.Placemark([55.741206, 37.614267], {
                        //	});
        }

        let fieldLink = document.querySelectorAll(".db");
        let dataLink = document.querySelectorAll(".db-datalist");
        let dataAllLinks = [];
        dataLink.forEach((el, index) => {
            dataAllLinks.push(Array.from(el.options, (option) => option.value));
        });

        fieldLink.forEach((el, index) => {
            el.onfocus = function () {
                dataLink[index].style.display = 'block';
                el.style.borderRadius = "5px 5px 0 0";  
            };

            for (let option of dataLink[index].options) {
                option.onmousedown = function () {
                    event.preventDefault();
                }
                option.onclick = function () {
                    el.value = option.value;
                    dataLink[index].style.display = 'none';
                    el.style.borderRadius = "5px";
                    let anotherInput = index & 1 == 1 ? index - 1 : index + 1;
                    console.log("Check tab - ", fieldLink.length, index, anotherInput);
                    let valueForNotherInput = dataAllLinks[anotherInput][dataAllLinks[index].indexOf(option.value)];
                    fieldLink[anotherInput].value = valueForNotherInput;
                    console.log("Hello - ", dataAllLinks[index].indexOf(option.value));
                    el.blur();
                }
            }

            el.oninput = function() {
                let currentFocus = -1;
                let text = el.value.toUpperCase();
                for (let option of dataLink[index].options) {
                    if(option.value.toUpperCase().indexOf(text) > -1) {
                        option.style.display = "block";
                    } else {
                        option.style.display = "none";
                    }
                };
            }

        });

        fieldLink.forEach((el, index) => {
            el.onblur = function (event) {
                dataLink[index].style.display = 'none';
                el.style.borderRadius = "0px";  

            };
        });
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
                mapWrap.classList.toggle("map-visibility-1");
                mapElem.classList.toggle("map-Yandex-Exact-dsp");
            }
        });
    });
</script>
<script type="text/javascript">
</script>



    
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
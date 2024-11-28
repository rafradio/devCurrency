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
    height: 900px;
}
.right-column {
    width: 670px !important;
    padding-left: 0 !important;
    padding-right: 0 !important;
}
.map-Yandex-Size {
    width: 90%;
    height: 525px;
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
    height: 25px;
    width: 165px;
}
.controller-item-last {
    justify-content: flex-end !important;
    align-items: flex-start;
}
.change-option {
    display: flex;
    position: relative;
    align-items: center;
    justify-content: center;
    width: 48%;
    height: 100%;
    font-size: 12px;
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
                <div class="change-option">Списком</div>
                <div class="change-option">На карте</div>
            </div>
        </div>
    </div>
    <div id="map" class="map-Yandex-Size"></div>
</div>

<script type="text/javascript">
$(document).ready(function () {
    ymaps.ready(init);
    function init() {
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



    
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
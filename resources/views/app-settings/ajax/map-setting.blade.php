<style>
    /* Set the size of the div element that contains the map */
    #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
    }

    #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
    }

    #infowindow-content .title {
        font-weight: bold;
    }

    #infowindow-content {
        display: none;
    }

    #map #infowindow-content {
        display: inline;
    }

    .pac-card {
        background-color: #fff;
        border: 0;
        border-radius: 2px;
        box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
        margin: 10px;
        padding: 0 0.5em;
        font: 400 18px Roboto, Arial, sans-serif;
        overflow: hidden;
        font-family: Roboto;
        padding: 0;
    }

    #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
    }

    .pac-controls {
        display: inline-block;
        padding: 5px 11px;
    }

    .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
    }

    #pac-input {
        background-color: #fff;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
    }

    #pac-input:focus {
        border-color: #4d90fe;
    }

    #title {
        font-size: 18px;
        font-weight: 500;
        padding: 10px 12px;
    }

</style>
<div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4 ">
    <div class="row">
        <div class="col-lg-6 mb-0">
            <x-forms.text :fieldLabel="__('modules.accountSettings.google_map_key')"
                          fieldPlaceholder="e.g. AIzaSyDSl2bG7XXXXXXXXXXXXXXXXXX"
                          fieldName="google_map_key" fieldId="google_map_key"

                          :fieldValue="company()->google_map_key"/>
            <small class="form-text text-muted my-2">Visit <a href='https://console.cloud.google.com/project/_/google/maps-apis/overview' target="_blank"> Google Cloud Console</a></small>
        </div>

        <div class="col-lg-3">
            <x-forms.text :fieldLabel="__('modules.accountSettings.latitude')"
                          fieldPlaceholder="e.g. 38.895"
                          fieldName="latitude" fieldId="latitude" :fieldValue="company()->latitude"/>
        </div>

        <div class="col-lg-3">
            <x-forms.text :fieldLabel="__('modules.accountSettings.longitude')"
                          fieldPlaceholder="e.g. -77.0364"
                          fieldName="longitude" fieldId="longitude"
                          :fieldValue="company()->longitude"/>
        </div>

        <div class="col-lg-12 mt-4">
            <h4 class="f-16 font-weight-500 text-capitalize">
                @lang('modules.accountSettings.businessMapLocation')</h4>

            <div class="pac-card" id="pac-card">
                <div>
                    <div id="title">@lang('modules.accountSettings.autocompleteSearch')</div>
                    <div id="type-selector" class="pac-controls d-none">
                        <input type="radio" name="type" id="changetype-all" checked="checked"/>
                        <label for="changetype-all">All</label>

                        <input type="radio" name="type" id="changetype-establishment"/>
                        <label for="changetype-establishment">establishment</label>

                        <input type="radio" name="type" id="changetype-address"/>
                        <label for="changetype-address">address</label>

                        <input type="radio" name="type" id="changetype-geocode"/>
                        <label for="changetype-geocode">geocode</label>

                        <input type="radio" name="type" id="changetype-cities"/>
                        <label for="changetype-cities">(cities)</label>

                        <input type="radio" name="type" id="changetype-regions"/>
                        <label for="changetype-regions">(regions)</label>
                    </div>
                    <br/>
                    <div id="strict-bounds-selector" class="pac-controls d-none">
                        <input type="checkbox" id="use-location-bias" value="" checked/>
                        <label for="use-location-bias">Bias to map viewport</label>

                        <input type="checkbox" id="use-strict-bounds" value=""/>
                        <label for="use-strict-bounds">Strict bounds</label>
                    </div>
                </div>
                <div id="pac-container">
                    <input id="pac-input" type="text" placeholder="@lang('placeholders.location')"/>
                </div>
            </div>

            <div id="infowindow-content">
                <span id="place-name" class="title"></span><br/>
                <span id="place-address"></span>
            </div>

            <div id="map" class="border rounded"></div>

        </div>
    </div>
</div>
<div class="w-100 border-top-grey set-btns">
    <x-setting-form-actions>
        <x-forms.button-primary id="save-google-map-setting-form" class="mr-3" icon="check">@lang('app.save')
        </x-forms.button-primary>

    </x-setting-form-actions>
</div>

<script>
    $('body').on('click', '#save-google-map-setting-form', function () {
        const url = "{{ route('app-settings.update', [company()->id]) }}?page=google-map-setting";

        $.easyAjax({
            url: url,
            container: '#editSettings',
            type: "POST",
            disableButton: true,
            buttonSelector: "#save-google-map-setting-form",
            data: $('#editSettings').serialize(),
            success: function () {
                window.location.reload();
            }
        })
    });

</script>

<script
    src="https://maps.googleapis.com/maps/api/js?key={{ company()->google_map_key }}&callback=initMap&libraries=places&v=weekly"
    async>
</script>

<script>
    const myLatLng = {
        lat: parseFloat({{company()->latitude}}),
        lng: parseFloat({{company()->longitude}})
    };

    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            center: myLatLng,
            zoom: 17,
            mapTypeControl: false
        });

        const card = document.getElementById("pac-card");
        const pacinput = document.getElementById("pac-input");
        pacinput.classList.add("form-control", "height-35", "f-14");

        const biasInputElement = document.getElementById("use-location-bias");
        const strictBoundsInputElement = document.getElementById("use-strict-bounds");
        const options = {
            fields: ["formatted_address", "geometry", "name"],
            strictBounds: false,
            types: ["establishment"],
        };

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(card);

        const autocomplete = new google.maps.places.Autocomplete(pacinput, options);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo("bounds", map);

        const infowindow = new google.maps.InfoWindow();
        const infowindowContent = document.getElementById("infowindow-content");

        infowindow.setContent(infowindowContent);

        const marker = new google.maps.Marker({
            map,
            anchorPoint: new google.maps.Point(0, -29),
            position: myLatLng,
            Draggable: true,
            Title: "{{addslashes(company()->company_name)}}"
        });

        marker.addListener('drag', handleEvent);
        marker.addListener('dragend', handleEvent);

        autocomplete.addListener("place_changed", () => {
            infowindow.close();
            marker.setVisible(false);

            const place = autocomplete.getPlace();

            if (!place.geometry || !place.geometry.location) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }

            $('#latitude').val(place.geometry.location.lat());
            $('#longitude').val(place.geometry.location.lng());

            marker.setPosition(place.geometry.location);
            marker.setVisible(true);
            infowindowContent.children["place-name"].textContent = place.name;
            infowindowContent.children["place-address"].textContent =
                place.formatted_address;
            infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
            const radioButton = document.getElementById(id);

            radioButton.addEventListener("click", () => {
                autocomplete.setTypes(types);
                input.value = "";
            });
        }

        function handleEvent(event) {
            document.getElementById('latitude').value = event.latLng.lat();
            document.getElementById('longitude').value = event.latLng.lng();
        }

        setupClickListener("changetype-all", []);
        setupClickListener("changetype-address", ["address"]);
        setupClickListener("changetype-establishment", ["establishment"]);
        setupClickListener("changetype-geocode", ["geocode"]);
        setupClickListener("changetype-cities", ["(cities)"]);
        setupClickListener("changetype-regions", ["(regions)"]);
        biasInputElement.addEventListener("change", () => {
            if (biasInputElement.checked) {
                autocomplete.bindTo("bounds", map);
            } else {
                // User wants to turn off location bias, so three things need to happen:
                // 1. Unbind from map
                // 2. Reset the bounds to whole world
                // 3. Uncheck the strict bounds checkbox UI (which also disables strict bounds)
                autocomplete.unbind("bounds");
                autocomplete.setBounds({
                    east: 180,
                    west: -180,
                    north: 90,
                    south: -90
                });
                strictBoundsInputElement.checked = biasInputElement.checked;
            }

            input.value = "";
        });
        strictBoundsInputElement.addEventListener("change", () => {
            autocomplete.setOptions({
                strictBounds: strictBoundsInputElement.checked,
            });
            if (strictBoundsInputElement.checked) {
                biasInputElement.checked = strictBoundsInputElement.checked;
                autocomplete.bindTo("bounds", map);
            }

            input.value = "";
        });
    }
</script>

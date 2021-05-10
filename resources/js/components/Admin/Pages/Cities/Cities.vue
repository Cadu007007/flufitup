<template>
    <div class="Cities">
        <div
            class="alert alert-success mt-3 text-center d-none successMessage"
        ></div>
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>
        <div class="d-flex flex-row flex-wrap">
            <div class="column">
                <!-- <div class="page-header">
                    <p class="title" style="margin: 5px 0" v-if="loadedcities">
                        Added Cities
                    </p>
                </div> -->

                <div class="cities-flex-container" v-if="loadedcities">
                    <input
                        type="text"
                        class="city-search"
                        v-model="searchCityName"
                        @input="searchForCity"
                        placeholder="Search"
                        tabindex="0"
                    />
                    <div class="flex-column overflow-hidden">
                        <p
                            class="search-not-found"
                            v-if="loadedcities.length == 0"
                        >
                            No cities found
                        </p>
                        <div
                            class="city-user"
                            :id="city.id"
                            v-for="city in loadedcities"
                            :key="city.id"
                        >
                            <p class="city-item-name" style="margin-left: 20px">
                                {{ city.name }}
                            </p>
                            <div class="row">
                                <img
                                    src="/images/admin/icons/edit-icon.svg"
                                    @click="editCity(city.id)"
                                    class="mx-1"
                                />
                                <img
                                    src="/images/admin/icons/delete-icon.svg"
                                    @click="deleteCity(city.id)"
                                    class="mx-1"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form
                method="POST"
                class="add-form w-50"
                @submit="addCitySubmit($event)"
                v-if="editCityId == 0"
            >
                <input type="hidden" :value="csrf" name="_token" />

                <div class="column w-100 mx-auto">
                    <div class="row">
                        <div class="city-name">
                            <p class="title text-dark font-size-24">
                                Add New City
                            </p>
                            <input
                                type="text"
                                class="city-name-input addCityName"
                                name="name"
                                placeholder="City Name"
                                required
                            />

                            <input
                                v-for="zipcode in codes" :key="zipcode"
                                type="text"
                                class="city-name-input addCityName mt-1"
                                name="zip[]"
                                placeholder="Zip Code"
                                required
                            />
                            <p class="text-center mt-3" @click="codes++">Add a ZIP code</p>
                            
                            <button class="save-button mx-auto" type="submit">
                                Add City
                            </button>
                        </div>
                    </div>

                    <!-- <div class="button-container">
                        <button class="save-button" type="submit">
                            Add City
                        </button>
                    </div> -->
                </div>
            </form>

            <form
                class="add-form w-50"
                v-if="editCityId > 0"
                action=""
                @submit="updateCitySubmit($event)"
            >
                <input type="hidden" :value="csrf" name="_token" />

                <div class="column mx-auto w-100">
                    <div class="row">
                        <div class="city-name">
                            <p class="title text-dark">Edit City Name</p>
                            <input
                                type="text"
                                class="city-name-input"
                                name="name"
                                placeholder="City Name"
                                v-model="editCityName"
                            />
                            <input
                                type="hidden"
                                name="id"
                                v-model="editCityId"
                            />


                            <input
                                v-for="zipcode in loadedcodes" :key="zipcode"
                                type="text"
                                class="city-name-input addCityName mt-1"
                                name="zip[]"
                                :value="zipcode.code"
                                placeholder="Zip Code"
                                required
                            />
                            <p class="text-center mt-3" @click="loadedcodes++">Add a ZIP code</p>
                            

                            <div class="button-container" style="width: 300px">
                                <button
                                    class="save-button mx-auto"
                                    type="submit"
                                >
                                    Save
                                </button>
                                <button
                                    class="cancel-button mx-2"
                                    @click="editCityId = 0"
                                >
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- <div class="cities-container">
                <div
                    class="city-container"
                    v-for="city in loadedcities"
                    :key="city.id"
                >
                    <p class="city-title">
                        {{ city.name }}
                    </p>
                    <div
                        class="column"
                        style="width: 100%; margin-bottom: 10px"
                    >
                        <button class="button edit" @click="editCity(city.id)">
                            Edit
                        </button>
                        <button
                            class="button delete"
                            @click="deleteCity(city.id)"
                        >
                            Delete
                        </button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        setTimeout(() => {
            $(".addCityName").change(function(event) {
                if ($(event.target).val() == "") {
                    $(event.target).removeAttr("required");
                } else {
                    $(event.target).attr("required", true);
                }
            });
        }, 500);
    },
    data() {
        return {
            editCityName: "",
            editCityId: 0,
            codes: 0,
            cityname: "",
            loadedcities: this.cities,
            searchCityName: '',
            loadedcodes: [],
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content")
        };
    },
    components: {},
    props: [
        "title",
        "date",
        "cities",
        "addcityroute",
        "editcityroute",
        "deletecityroute"
    ],
    methods: {
        addCitySubmit(event) {
            event.preventDefault();
            var formValues = $(".add-form").serialize();
            console.log("formValues: ", formValues);
            axios({
                url: this.addcityroute,
                method: "POST",
                data: formValues
            }).then(response => {
                this.showSuccessMessage(response.data.message);
                let returnedObject = response.data.data;
                console.log("returnedObject: ", returnedObject);
                /* push data in the array */
                this.loadedcities.push({
                    id: returnedObject.id,
                    name: returnedObject.name
                });
                this.clearAddInputs();
            });
        },
        editCity(cityId) {
            let selectedCity = this.loadedcities.find(x => x.id == cityId);
            console.log("selectedCity: ", selectedCity);
            this.editCityName = selectedCity.name;
            this.editCityId = selectedCity.id;
            this.loadedcodes = selectedCity.zipcodes || []
        },

        updateCitySubmit(event) {
            event.preventDefault();
            var formValues = $(event.target).serialize();
            console.log("formValues: ", formValues);
            let selectedURL = this.editcityroute.replace(
                "city_id",
                this.editCityId
            );
            console.log("selectedURL: ", selectedURL);
            axios({
                url: selectedURL,
                method: "PUT",
                data: formValues
            }).then(response => {
                this.showSuccessMessage(response.data.message);
                let returnedObject = response.data.data;
                console.log("returnedObject: ", returnedObject);
                this.loadedcities.find(x => x.id == this.editCityId).name =
                    returnedObject.name;
                /* push data in the array */
                this.editCityId = 0;
            });
        },
        deleteCity(id) {
            let selectedURL = this.deletecityroute.replace("city_id", id);
            if (confirm("Are You Sure ?")) {
                axios({
                    url: selectedURL,
                    method: "DELETE",
                    data: id
                }).then(response => {
                    if (response.data.success) {
                        this.showSuccessMessage(response.data.message);
                        this.loadedcities = this.loadedcities.filter(
                            x => x.id != id
                        );
                    }
                    /* push data in the array */
                });
            }
        },
        clearAddInputs() {
            $(".addCityName")
                .val("")
                .change();
        },
        searchForCity() {
            let cityName = this.searchCityName.toLowerCase();
            let allCities = this.loadedcities;
            this.searchCities = [];
            if (cityName.length > 0) {
                allCities.forEach((city, index) => {
                    let currentCityName = city.name.toLowerCase();
                    if (currentCityName.search(cityName) >= 0) {
                        this.searchCities.push(city);
                    }
                });
                this.loadedcities = this.searchCities;
            } else {
                /* load all cities */
                this.loadedcities = this.cities;
            }
        },
        showSuccessMessage(messageText) {
            $(".successMessage").removeClass("d-none");
            $(".successMessage").text(messageText);
            setTimeout(() => {
                $(".successMessage").addClass("d-none");
            }, 3000);
        }
    }
};
</script>

<style lang="scss">
$text-grey: #00000066;
$blue: #22aee4;
$red: rgb(207, 42, 42);
$text-grey: #00000080;
$light-grey: #eef2f4;
$blue: #22aee4;
$black: #000;

.Cities {
    width: 100%;
    height: 80vh;
    .page-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        .title {
            margin: 26px 0;
            font-size: 21px;
            font-family: "Open-Sans-SemiBold";
        }
        .date {
            font-size: 12px;
            color: $text-grey;
            font-family: "Open-Sans-Regular";
        }
    }

    .column {
        display: flex;
        flex-direction: column;
    }

    .button-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin: 10px auto;
    }

    .save-button {
        margin: 30px auto;
        padding: 10px 40px;
        height: 45px;
        border-radius: 25px;
        background: $blue;
        color: #fff;
        font-size: 18px;
    }
    .cancel-button {
        margin: 30px auto;
        padding: 10px 40px;
        height: 45px;
        border-radius: 25px;
        color: $red;
        border: 1px solid $red;
        background: #fff;
        font-size: 18px;
    }

    .city-name {
        width: 812px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
        .title {
            color: $text-grey;
            font-size: 22px;
            // width: px !important;
            font-weight: bold;
            margin-bottom: 10px !important;
        }
        .center-title {
            position: relative;
            left: 70px;
            text-align: center;
        }
        .city-name-input {
            width: 480px;
            background: #f9f9f9;
            border: 2px solid #ededed;
            border-radius: 7px;
            margin: 0 0 0 40px;

            padding: 12px;
        }
    }

    .seperator {
        width: 100%;
        height: 1px;
        margin: 10px 0;
        background: #ccc;
    }
    .cities-container {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        .city-container {
            width: 200px;
            height: 190px;
            margin: 20px 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            border: 1px solid #ccc;
            border-radius: 20px;

            .city-title {
                width: 100%;
                text-align: center;
                margin: 20px auto;
                font-size: 20px;
            }
            .button {
                width: 90%;
                margin: 5px auto;
                height: 40px;
                border-radius: 20px;
                font-size: 14px;
                font-family: "Open-Sans-Bold";
                background: #fff;
                &.edit {
                    border: 2px solid #ffa800;
                    color: #ffa800;
                }
                &.delete {
                    border: 2px solid #ff0000;
                    color: #ff0000;
                }
            }
        }
    }

    .cities-flex-container {
        width: 100%;
        margin: 10px auto;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-items: flex-start;
        .city-search {
            border: 1px solid #ddd;
            padding: 5px 10px;
            border-radius: 5px;
            margin-bottom: 12px;
            width: 350px;
        }
        .flex-column {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            height: 400px;
            width: 350px;
            overflow-y: auto;
            background: #f9f9f9;
            position: relative;
            .search-not-found {
                text-align: center;
                color: #aaa;
                width: 100%;
                margin: 10px auto;
            }

            .city-user {
                margin: 8px 0;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: flex-start;
                color: $black;
                width: 300px;
                &.active {
                    color: $blue !important;
                }
                .city-item-name {
                    font-family: "Open-Sans-Semibold";
                    font-size: 16px;
                    text-align: left !important;
                }
                .users-count {
                    margin-left: 20px;
                    font-family: "Open-Sans-Bold";
                    font-size: 16px;
                }
            }
        }
        .users-card {
            width: 444px;
            height: fit-content;
            box-shadow: 0px 0px 6px #0000001a;
            border: 2px solid #e8ecf3;
            margin-left: 200px;
            padding: 16px 24px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            max-height: 450px;
            overflow-y: auto;
            .user-container {
                width: 100%;
                height: 40px;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                font-size: 15px;
                font-family: "Open-Sans-Regular";
                color: $text-grey;
                border-bottom: 1px solid #eef2f4;
                .card-title {
                    font-family: "Open-Sans-Regular";
                    color: $text-grey;
                    height: 30px;
                    padding-bottom: 5px;
                }
                .username {
                    font-size: 13px;
                    font-family: "Open-Sans-Bold";
                    color: $blue;
                    cursor: pointer;
                    height: 35px;
                    display: flex;
                    flex-direction: column;
                    align-items: flex-start;
                    justify-content: center;
                }
            }
        }
    }
}
</style>

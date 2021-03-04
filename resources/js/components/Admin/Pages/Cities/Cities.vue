<template>
    <div class="Cities">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>
        <div class="column">
            <form
                method="POST"
                class="add-form"
                @submit="addCitySubmit($event)"
            >
                <input type="hidden" :value="csrf" name="_token" />

                <div class="column" v-if="editCityId == 0">
                    <div class="row">
                        <div class="city-name">
                            <p class="title">City Name:</p>
                            <input
                                type="text"
                                class="city-name-input"
                                name="name"
                                placeholder="City Name"
                                v-model="cityname"
                                required
                            />
                        </div>
                    </div>

                    <div class="button-container">
                        <button class="save-button" type="submit">
                            Add City
                        </button>
                    </div>
                </div>
            </form>

            <form action="" @submit="updateCitySubmit($event)">
                <input type="hidden" :value="csrf" name="_token" />

                <div class="column" v-if="editCityId > 0">
                    <div class="row">
                        <div class="city-name">
                            <p class="title">City Name:</p>
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
                        </div>
                    </div>

                    <div class="button-container" style="width: 40%">
                        <button class="save-button" type="submit">Save</button>
                        <button class="cancel-button" @click="editCityId = 0">
                            Cancel
                        </button>
                    </div>
                </div>
            </form>

            <div class="seperator"></div>

            <div class="page-header">
                <p class="title" style="margin: 5px 0" v-if="loadedcities">
                    Added Cities
                </p>
            </div>

            <div class="cities-container">
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
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            editCityName: "",
            editCityId: 0,
            cityname: "",
            loadedcities: this.cities,
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
                let returnedObject = response.data.data;
                console.log("returnedObject: ", returnedObject);
                /* push data in the array */
                this.loadedcities.push({
                    id: returnedObject.id,
                    name: returnedObject.name
                });
            });
        },
        editCity(cityId) {
            let selectedCity = this.loadedcities.find(x => x.id == cityId);
            console.log("selectedCity: ", selectedCity);
            this.editCityName = selectedCity.name;
            this.editCityId = selectedCity.id;
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
                let returnedObject = response.data.data;
                console.log("returnedObject: ", returnedObject);
                /* push data in the array */
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
                    let returnedObject = response.data.data;
                    console.log("returnedObject: ", returnedObject);
                    /* push data in the array */
                });
            }
        }
    }
};
</script>

<style lang="scss">
$text-grey: #00000066;
$blue: #22aee4;
$red: rgb(207, 42, 42);

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
    }

    .city-name {
        width: 812px;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        margin: 0 auto;
        .title {
            color: $text-grey;
            font-size: 16px;
            width: 92px !important;
        }
        .center-title {
            position: relative;
            left: 70px;
            text-align: center;
        }
        .city-name-input {
            width: 580px;
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
}
</style>

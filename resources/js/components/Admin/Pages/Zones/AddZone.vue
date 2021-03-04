<template>
            <form
                method="POST"
                class="add-form"
                @submit="addSubmit($event)"
            >
                <input type="hidden" :value="csrf" name="_token" />

    <div class="AddZone">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>

        <div class="alert alert-success mt-3 text-center d-none successMessage">
            Zone Created Successfully
        </div>
        <div class="zone-cities-container">
            <div class="zone-name">
                <p class="title">Zone Name:</p>
                <input
                    type="text"
                    class="zone-name-input"
                    name="name"
                    placeholder="Zone Name"
                />
                <p class="center-title">Proccessing Center</p>
                <p class="center-title">Washing Center</p>
            </div>
            <div class="zone-cities-container">
                <div class="zone-city">
                    <div class="first-row">
                        <p class="title">Zone Cities:</p>
                        <div class="city-row">
                            <p class="text-center">Choose Zone Zities</p>
                        </div>
                    </div>
                    <div class="cities">
                        <div
                            class="city-row"
                            v-for="(input, index) in inputs"
                            :key="index"
                        >
                            <select
                                class="select2 zone-name-input zoneCityDropdown"
                                style="width: 430px"
                                name="cities[]"
                            >
                            <option disabled selected>City Name</option>
                                <option v-for="city in cities" :key="city.id"
                                   :value="city.id" >{{city.name}}</option
                                >
                            </select>
                            <span class="delete-city" @click="removeCityRow"
                                >X</span
                            >
                            <input
                                type="checkbox"
                                name="processing_center"
                                class="checkbox1"
                            />
                            <input
                                type="checkbox"
                                name="washing_center"
                                class="checkbox2"
                            />
                        </div>

                        <p class="add-another-city" @click="addButtonPressed()">
                            Add Another City
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="button-container">
            <button class="save-button" type="submit">Save</button>
        </div>
    </div>
</form>

</template>

<script>
export default {
    props: ["title", "date","addzoneroute","cities"],
    data() {
        return {
            inputs: 1,
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content")
        };
    },
    methods: {
        removeCityRow(event) {
            event.target.parentNode.remove();
        },
        addButtonPressed() {
            this.inputs++;
            setTimeout(() => {
                $(".select2").select2();
            }, 300);
        },
        addSubmit(event) {
            event.preventDefault();
            var formValues = $(".add-form").serialize();
            console.log("formValues: ", formValues);
            axios({
                url: this.addzoneroute,
                method: "POST",
                data: formValues
            }).then(response => {
                console.log(response.data);
                if(response.data.success){
                    this.showSuccessMessage()
                    this.clearInputs()
                }
                
            });
        },
        showSuccessMessage() {
            $(".successMessage").removeClass("d-none");
            setTimeout(() => {
                $(".successMessage").addClass("d-none");
            }, 3000);
        },
        clearInputs(){
            $(".zone-name-input").val("").change()
            $(".zoneCityDropdown").val(null).change()
        }
    }
};
</script>

<style lang="scss">
$text-grey: #00000080;
$orange: #ffa800;
$blue: #22aee4;

.PageContainer {
    padding: 0 !important;
}
.AddZone {
    width: 100%;
    height: 80vh;
    .page-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 0 24px;
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
    .zone-cities-container {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        .zone-name {
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
            .zone-name-input {
                width: 428px;
                background: #f9f9f9;
                border: 2px solid #ededed;
                border-radius: 7px;
                margin: 0 0 0 40px;

                padding: 12px;
            }
        }
        .zone-cities-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 30px auto;
            .zone-city {
                width: 812px;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: center;
                margin: 0 auto;
                position: relative;
                .first-row {
                    width: 812px;
                    display: flex;
                    flex-direction: row;
                    justify-content: flex-start;
                    align-items: center;
                    margin: 0 auto;
                }

                .title {
                    color: $text-grey;
                    font-size: 16px;
                }

                .city-row {
                    position: relative;
                    margin: 0 0 0 40px;
                    .delete-city {
                        position: absolute;
                        top: 2px;
                        right: -25px;
                        cursor: pointer;
                    }
                    .checkbox1 {
                        position: absolute;
                        top: 2px;
                        right: -150px;
                    }
                    .checkbox2 {
                        position: absolute;
                        top: 2px;
                        right: -270px;
                    }
                }

                .cities {
                    display: flex;
                    flex-direction: column;
                    justify-content: flex-start;
                    width: 100%;
                    align-items: flex-start;
                    margin-right: 50px;
                    margin-left: 225px;
                    .city-row {
                        margin-top: 10px;
                        .delete-city {
                            position: absolute;
                            top: 2px;
                            right: -25px;
                            cursor: pointer;
                        }
                    }
                    .add-another-city {
                        width: 628px;
                        text-align: center;
                        margin-top: 20px;
                        font-size: 16px;
                        color: $orange;
                        font-family: "Open-Sans-SemiBold";
                        cursor: pointer;
                    }
                }
                .zone-name-input {
                    width: 628px;
                    background: #f9f9f9;
                    border: 2px solid #ededed;
                    border-radius: 7px;
                    padding: 12px;
                }
            }
        }
    }

    .button-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin: 30px auto;
        .save-button {
            margin: 30px auto;
            padding: 10px 40px;
            height: 45px;
            border-radius: 25px;
            background: $blue;
            color: #fff;
            font-size: 18px;
        }
    }
}
</style>

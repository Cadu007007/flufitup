<template>
    <div class="AddLaunderyStaff">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>
        <form action="/dummy" method="post">
            <input type="hidden" :value="csrf" name="_token" />

            <div class="container">
               <div class="left position-relative">
                    <span
                        class="remove-image"
                        @click="removeImage($event)"
                        hidden
                        >X</span
                    >
                    <img
                        src="/images/icons/profile.svg"
                        alt=""
                        class="uploaded-image"
                    />
                    <input
                        type="file"
                        class="image-file"
                        name="image"
                        @change="readURL($event)"
                    />
                </div>

                <div class="right">
                    <div class="info-container">
                        <p class="title">Delivery Name :</p>
                        <input
                            type="text"
                            class="input"
                            name="name"
                            placeholder="Delivery Name"
                            :value="driver[0].name"
                        />
                    </div>

                    <div class="info-container">
                        <p class="title">Birthday :</p>
                        <input
                            type="date"
                            class="input"
                            name="birthday"
                            placeholder="Birthday"
                            :value="driver[0].birthday"
                        />
                    </div>

                    <div class="info-container">
                        <p class="title">Phone Number :</p>
                        <input
                            type="text"
                            class="input"
                            name="phone"
                            placeholder="Phone Number"
                            :value="driver[0].phone"
                        />
                    </div>
                    <div class="info-container">
                        <p class="title">Address :</p>
                        <input
                            type="text"
                            class="input"
                            name="address"
                            placeholder="Address"
                            :value="driver[0].address"
                        />
                    </div>

                    <div class="info-container">
                        <p class="title">Driver's license number :</p>
                        <input
                            type="text"
                            class="input"
                            name="license"
                            placeholder="Driver's license number :"
                            :value="driver[0].license"
                        />
                    </div>
                </div>
            </div>
            <div class="seperator"></div>
            <div class="car-details-container">
                <p class="title">Car Details</p>

                <div class="container">
                    <div class="left"></div>

                    <div class="right">
                        <div class="info-container">
                            <p class="title">Car Type :</p>
                            <input
                                type="text"
                                class="input"
                                name="car_type"
                                placeholder="Lorem Ipsum is simply dummy"
                                :value="driver[0].car_type"
                            />
                        </div>

                        <div class="info-container">
                            <p class="title">Car Model :</p>
                            <input
                                type="text"
                                class="input"
                                name="car_model"
                                placeholder="Lorem Ipsum is simply dummy"
                                :value="driver[0].car_model"
                            />
                        </div>

                        <div class="info-container">
                            <p class="title">Production Date :</p>
                            <input
                                type="date"
                                class="input"
                                name="car_production_date"
                                placeholder="MM/DD/YYYY"
                                :value="driver[0].car_production_date"
                            />
                        </div>
                        <div class="info-container">
                            <p class="title">Plate Number :</p>
                            <input
                                type="text"
                                class="input"
                                name="car_plate_number"
                                placeholder="Lorem Ipsum is simply dummy"
                                :value="driver[0].car_plate_number"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <div class="seperator"></div>
            <div class="car-details-container">
                <p class="title">Assignments</p>

                <div class="container">
                    <div class="left"></div>

                    <div class="right">
                        <div class="info-container">
                            <p class="title">Zones</p>
                            <select
                                class="select2"
                                style="width: 400px"
                                name="zones"
                                multiple="multiple"
                            >
                                <option value="1" selected>Zone A</option>
                                <option value="2">Zone B</option>
                            </select>
                        </div>
                        <div class="info-container">
                            <p class="title">Cities</p>
                            <select
                                class="select2"
                                style="width: 400px"
                                name="zones"
                                multiple="multiple"
                            >
                                <option value="1" selected>Irvine</option>
                                <option value="2">Tustin</option>
                            </select>
                        </div>
                        <div class="info-container">
                            <p class="title">Assignment Date</p>
                            <input
                                type="date"
                                class="input"
                                name="assignment_date"
                                id=""
                                :value="driver[0].assignment_date"
                            />
                        </div>
                        <div class="info-container">
                            <p class="title">Shift</p>
                            <select
                                class="select2"
                                style="width: 400px"
                                name="zones"
                                multiple="multiple"
                            >
                                <option value="1">Morning</option>
                                <option value="2">Noon</option>
                                <option value="3" selected>Night</option>
                            </select>
                        </div>
                        <div class="info-container">
                            <p class="title">Notes</p>
                            <input
                                type="text"
                                class="input"
                                name="notes"
                                placeholder="Lorem Ipsum is simply dummy"
                                :value="driver[0].notes"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <div class="buttons-container">
                <button class="button save">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props: ["title", "date", "driver"],
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content")
        };
    },
     methods: {
        readURL(event) {
            let input = event.target;
            console.log("input: ", input);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    let imageContainer = $(input)
                        .parent()
                        .parent()
                        .find(".uploaded-image");
                    $(input)
                        .parent()
                        .parent()
                        .find(".remove-image")
                        .removeAttr("hidden");
                    imageContainer.attr("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        },
        removeImage(event) {
            let removeButton = event.target;
            $(removeButton)
                .parent()
                .find(".image-file")
                .val("");
            $(removeButton)
                .parent()
                .find(".uploaded-image")
                .attr("src", "");
            $(removeButton).attr("hidden", true);
        }
    }
};
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey: #eef2f4;
$blue: #22aee4;
$black: #000;
$green: #00c319;
$red: red;

.AddLaunderyStaff {
    width: 100%;
    height: 100%;
    .page-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        .title {
            margin: 26px 0 10px 0;
            font-size: 21px;
            font-family: "Open-Sans-SemiBold";
        }
        .date {
            font-size: 12px;
            color: $text-grey;
            font-family: "Open-Sans-Regular";
        }
    }
    .container {
        width: 100%;
        display: grid;
        grid-template-columns: 200px 1fr;
        justify-content: flex-start;
        align-content: flex-start;
        .left {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            .uploaded-image {
                width: 140px;
                height: 140px;
                border-radius: 70px;
            }
            .username {
                font-family: "Open-Sans-Bold";
                font-size: 21px;
                color: $black;
                margin-top: 16px;
            }
        }
        .right {
            margin-left: 30px;
            .info-container {
                display: flex;
                flex-direction: row;
                justify-content: flex-start;
                align-items: center;
                margin: 10px auto;
                .title {
                    width: 200px;
                    font-size: 16px;
                    font-family: "Open-Sans-Semibold";
                    color: $text-grey;
                }
                .value {
                    font-family: "Open-Sans-Semibold";
                    font-size: 18px;
                    color: $black;
                }
                .edit-wallet {
                    margin-left: 66px;
                    font-size: 14px;
                    color: $blue;
                    cursor: pointer;
                }
            }
        }
        .input {
            width: 400px;
            max-width: 628px;
            background: #f9f9f9;
            border: 2px solid #ededed;
            border-radius: 7px;
            padding: 12px;
            font-size: 14px;
            &.name-input {
                width: auto;
                margin: 10px auto;
            }
        }
    }

    .seperator {
        width: 100%;
        height: 1px;
        background: #ccc;
        margin: 20px auto;
    }
    .car-details-container {
        .title {
            font-size: 18px;
            font-family: "Open-Sans-Bold";
            color: $blue;
        }
    }
    .buttons-container {
        width: 100%;
        height: fit-content;
        margin: 30px auto;
        display: flex;
        justify-content: center;
        .button {
            width: 200px;
            height: 40px;
            margin: 0 20px;
            border-radius: 20px;
            font-size: 14px;
            font-family: "Open-Sans-Bold";
            background: #fff;
            color: #fff;
            background: $blue;
        }
    }

    .image-file {
        width: 140px;
        height: 140px;
        background: #ccc;
        position: absolute;
        opacity: 0;
        border-radius: 70px;
    }
    .remove-image {
        position: absolute;
        left: 83%;
        font-size: 10px;
        background: red;
        width: 15px;
        height: 15px;
        text-align: center;
        border-radius: 10px;
        top: 2px;
        color: #222;
    }
}
</style>

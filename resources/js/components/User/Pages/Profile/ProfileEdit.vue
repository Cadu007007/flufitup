<template>
    <div class="ProfileEdit">
        <div
            class="alert alert-success mt-3 text-center d-none successMessage"
        ></div>
        <div
            class="alert alert-danger mt-3 text-center d-none errorMessage"
        ></div>

        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>

        <!-- @submit="submitForm($event)" -->
        <form
            :action="formactionroute"
            method="post"
            enctype="multipart/form-data"
            class="form"
        >
            <div class="edit-profile-form-container">
                <div class="form-input-container w-100">
                    <input type="hidden" :value="csrf" name="_token" />

                    <div class="my-4"></div>
                    <div class="image-name-div my-2">
                        <span class="remove-image" @click="removeImage()"
                            >X</span
                        >
                        <img :src="profileimage" alt="" class="image" />
                        <input
                            @change="readURL($event)"
                            type="file"
                            name="avatar"
                            class="image-file"
                        />
                    </div>
                    <div
                        class="d-flex flex-row flex-wrap justify-content-between align-items-center"
                    >
                        <div class="SmartInputContainer">
                            <label class="label" for="email">Email</label>
                            <input
                                type="email"
                                placeholder="Enter yout email"
                                :value="user.email"
                                name="email"
                                class="input emailInput"
                                :disabled="emaildisabled"
                            />
                        </div>
                        <button
                            class="btn btn-primary"
                            type="button"
                            style="height: 40px"
                            @click="enableEmail"
                        >
                            Change Email
                        </button>
                    </div>
                    <!-- <div class="" v-if="changeemail">
                        <Smart-Input-Container
                            title="New Email"
                            inputName="new_email"
                            placeholder="Enter New Email"
                            type="text"
                        />
                        <Smart-Input-Container
                            title="Confirm New Email"
                            inputName="confirm_new_email"
                            placeholder="Confirm New Email"
                            type="text"
                        />
                    </div> -->

                    <br />

                    <div
                        class="d-flex flex-row flex-wrap justify-content-between align-items-center"
                    >
                        <div class="SmartInputContainer">
                            <label class="label" for="phone">Phone</label>
                            <input
                                type="phone"
                                placeholder="Enter your phone"
                                :value="user.phone"
                                name="phone"
                                class="input phoneInput"
                                :disabled="phonedisabled"
                            />
                        </div>
                        <button
                            class="btn btn-primary"
                            type="button"
                            style="height: 40px"
                            @click="enablePhone"
                        >
                            Change Phone
                        </button>
                    </div>

                    <!-- <div class="" v-if="changephone">
                        <Smart-Input-Container
                            title="New Phone Number"
                            inputName="new_phone"
                            placeholder="( XXX ) - XXX - XXXX"
                            type="text"
                        />
                    </div> -->
                </div>

                <!-- Pickup -->
                <input
                    type="hidden"
                    name="address[0][address_type]"
                    value="pickup"
                />
                <!-- :addressTypeVal="user.addresses[0].address_type" -->
                <AddressInputsContainer
                    title="Pickup"
                    buildingTypeName="address[0][building_type]"
                    residentialTypeName="address[0][residential_type]"
                    streetAddressName="address[0][street]"
                    cityName="address[0][city]"
                    stateName="address[0][state]"
                    zipCodeName="address[0][zip]"
                    unitNumberName="address[0][unit_number]"
                    buildingNumberName="address[0][building_name]"
                    gateCodeName="address[0][gate_code]"
                    :selectedbuildingtype="user.addresses[0].building_type"
                    :residentialTypeVal="user.addresses[0].residential_type"
                    :streetAddressVal="user.addresses[0].street"
                    :cityVal="user.addresses[0].city"
                    :stateVal="user.addresses[0].state"
                    :zipCodeVal="user.addresses[0].zip"
                    :unitNumberVal="user.addresses[0].unit_number"
                    :buildingNumberVal="user.addresses[0].building_name"
                    :gateCodeVal="user.addresses[0].gate_code"
                />

                <div class="drop-off-hint" v-if="!showdDropOffAddress">
                    <p class="hint">
                        If Drop off Address is different from Pick up Address
                    </p>
                    <p
                        class="show-dropoff"
                        @click="showdDropOffAddress = !showdDropOffAddress"
                    >
                        Add Drop off Address
                    </p>
                </div>

                <div
                    class=""
                    v-if="showdDropOffAddress || user.addresses[1] != undefined"
                >
                    <input
                        type="hidden"
                        name="address[1][address_type]"
                        value="drop"
                    />

                    <AddressInputsContainer
                        title="Drop off"
                        buildingTypeName="address[1][building_type]"
                        residentialTypeName="address[1][residential_type]"
                        streetAddressName="address[1][street]"
                        cityName="address[1][city]"
                        stateName="address[1][state]"
                        zipCodeName="address[1][zip]"
                        unitNumberName="address[1][unit_number]"
                        buildingNumberName="address[1][building_name]"
                        gateCodeName="address[1][gate_code]"
                        :selectedbuildingtype="
                            user.addresses[1] != undefined
                                ? user.addresses[1].building_type
                                : ''
                        "
                        :residentialTypeVal="
                            user.addresses[1] != undefined
                                ? user.addresses[1].residential_type
                                : ''
                        "
                        :streetAddressVal="
                            user.addresses[1] != undefined
                                ? user.addresses[1].street
                                : ''
                        "
                        :cityVal="
                            user.addresses[1] != undefined
                                ? user.addresses[1].city
                                : ''
                        "
                        :stateVal="
                            user.addresses[1] != undefined
                                ? user.addresses[1].state
                                : ''
                        "
                        :zipCodeVal="
                            user.addresses[1] != undefined
                                ? user.addresses[1].zip
                                : ''
                        "
                        :unitNumberVal="
                            user.addresses[1] != undefined
                                ? user.addresses[1].unit_number
                                : ''
                        "
                        :buildingNumberVal="
                            user.addresses[1] != undefined
                                ? user.addresses[1].building_name
                                : ''
                        "
                        :gateCodeVal="
                            user.addresses[1] != undefined
                                ? user.addresses[1].gate_code
                                : ''
                        "
                    />
                </div>

                <div class="form-input-container">
                    <Smart-Input-Container
                        title="Date of Birth"
                        inputName="birthday"
                        placeholder="MM / DD / YYYY"
                        type="date"
                        :inputval="user.birth_date"
                    />
                    <!-- <div class="d-flex flex-row justify-content-start">
    <input type="checkbox" name="above_age">
    <p class="above-age mx-3">I confirm I’m above 18</p>
  </div> -->
                </div>
            </div>
            <div class="button-container">
                <button type="submit" class="action-button">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
import SmartInputContainer from "../../Components/SmartInputContainer";
import AddressInputsContainer from "../../Components/AddressInputsContainer";

export default {
    data() {
        return {
            title: "Edit Profile",
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            showdDropOffAddress: false,
            changeemail: false,
            changephone: false,
            emaildisabled: true,
            phonedisabled: true
        };
    },
    props: ["date", "formactionroute", "profileimage", "user"],
    components: {
        SmartInputContainer,
        AddressInputsContainer
    },
    methods: {
        readURL(event) {
            let input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    let imageContainer = $(input)
                        .parent()
                        .find(".image");
                    imageContainer.attr("src", e.target.result);
                    $(input)
                        .parent()
                        .find(".remove-image")
                        .removeAttr("hidden");
                };

                reader.readAsDataURL(input.files[0]);
            }
        },
        removeImage() {
            $(".image").attr("src", "");
            $(".image-file").val(null);
        },
        enableEmail() {
            this.emaildisabled = false;
            setTimeout(() => {
                $(".emailInput").focus();
            }, 300);
        },
        enablePhone() {
            this.phonedisabled = false;
            setTimeout(() => {
                $(".phoneInput").focus();
            }, 300);
        },

        submitForm(event) {
            event.preventDefault();
            let uploadedImage = $(".image-file")[0].files[0];

            let formData = $(event.target).serializeArray();
            formData.push({ name: "image", value: uploadedImage });
            console.log("formData: ", formData);

            axios({
                url: this.formactionroute,
                method: "POST",
                data: formData
            }).then(response => {
                console.log(response.data);
                if (response.data.success) {
                    this.showSuccessMessage(response.data.message);
                    this.clearInputs();
                } else {
                    this.showErrorMessage(response.data.messages);
                }
            });
        },

        showSuccessMessage(messageText) {
            $(".successMessage").removeClass("d-none");
            $(".successMessage").text(messageText);
            setTimeout(() => {
                $(".successMessage").addClass("d-none");
            }, 3000);
        },
        showErrorMessage(errors) {
            let errorsText = "";
            errors.forEach(error => {
                errorsText += error + "</br>";
            });
            console.log("errorsText: ", errorsText);
            $(".errorMessage").removeClass("d-none");
            $(".errorMessage").html(errorsText);
            setTimeout(() => {
                $(".errorMessage").addClass("d-none");
            }, 3000);
        }
    }
};
</script>
<style lang="scss">
$text-grey: #00000066;
$blue: #22aee4;
$white: #ffffff;
$black: #000000;

.ProfileEdit {
    padding: 0 140px 0 16px;
    .page-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        .title {
            margin: 26px 0;
            font-size: 12px;
            font-weight: bold;
        }
        .date {
            font-size: 10px;
            color: $text-grey;
        }
    }

    .edit-profile-form-container {
        width: 100%;
        .form-input-container {
            width: 444px;
            .SmartInputContainer {
                margin-bottom: 36px;
            }
        }

        .drop-off-hint {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-bottom: 36px;
            .hint {
                color: $text-grey;
                font-size: 14px;
            }
            .show-dropoff {
                font-size: 16px;
                font-family: "Lato-Bold";
                color: $blue;
                cursor: pointer;
            }
        }
    }

    .button-container {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        margin-bottom: 36px;

        .action-button {
            width: 200px;
            height: 40px;
            background: $blue;
            border-radius: 35px;
            font-size: 18px;
            color: $white;
        }
    }

    .image-name-div {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        position: relative;
        .image {
            width: 120px;
            height: 120px;
            margin-top: 17px;
            border-radius: 60px;
        }
        .name {
            margin-top: 24px;
            font-size: 18px;
            font-weight: bold;
            color: $black;
        }
        .edit-icon {
            width: 30px;
            height: 30px;
            position: absolute;
            right: 120px;
            top: 50px;
        }

        .image-file {
            height: 100px;
            background: rgb(204, 204, 204) none repeat scroll 0% 0%;
            top: 10px;
            left: -120px;
            position: relative;
            width: 130px;
            opacity: 0;
        }
        .remove-image {
            position: relative;
            left: 355px;
            font-size: 10px;
            background: red;
            width: 15px;
            height: 15px;
            text-align: center;
            border-radius: 10px;
            top: 22px;
            color: #222;
            top: -50px;
            left: 120px;
        }
    }
}
</style>

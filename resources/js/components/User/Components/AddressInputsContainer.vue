<template>
    <div class="AddressInputsContainer">
        <p class="title mb-4">{{ title }} Address</p>

        <div class="filter-options">
            <div class="filter">
                <input
                    class="radio"
                    type="radio"
                    :checked="selectedbuildingtype == 'residential'"
                    @click="showResidentialOptions"
                    :name="buildingTypeName"
                    value="residential"
                    id=""
                />
                <label class="filter-label" :for="buildingTypeName"
                    >Residential</label
                >
            </div>
            <div class="filter">
                <input
                    class="radio"
                    type="radio"
                    :checked="selectedbuildingtype == 'business'"
                    @click="hideResidentialOptions"
                    :name="buildingTypeName"
                    value="business"
                    id=""
                />
                <label class="filter-label" :for="buildingTypeName"
                    >Business</label
                >
            </div>
        </div>

        <div class="filter-options" v-if="isResidential == true">
            <div class="filter">
                <input
                    class="radio"
                    type="radio"
                    :checked="residentialTypeVal == 'apartment'"
                    :name="residentialTypeName"
                    value="apartment"
                    id=""
                />
                <label class="filter-label" :for="residentialTypeName"
                    >Appartment</label
                >
            </div>
            <div class="filter">
                <input
                    class="radio"
                    type="radio"
                    :checked="residentialTypeVal == 'house'"
                    :name="residentialTypeName"
                    value="house"
                    id=""
                />
                <label class="filter-label" :for="residentialTypeName"
                    >House</label
                >
            </div>
        </div>

        <div class="inputs-container">
            <input
                class="input"
                :name="streetAddressName"
                :value="streetAddressVal"
                placeholder="Street Address"
            />
            <input
                class="input"
                :name="cityName"
                :value="cityVal"
                placeholder="City"
            />
            <input
                class="input"
                :name="stateName"
                :value="stateVal"
                placeholder="State"
            />
            <input
                class="input"
                :name="zipCodeName"
                :value="zipCodeVal"
                placeholder="ZIP Code"
            />
            <input
                class="input"
                :name="unitNumberName"
                :value="unitNumberVal"
                placeholder="Unit Number"
            />
            <input
                class="input"
                :name="buildingNumberName"
                :value="buildingNumberVal"
                placeholder="Building Name ( Optional )"
            />
            <input
                class="input"
                :name="gateCodeName"
                :value="gateCodeVal"
                placeholder="Gate Code ( Optional )"
            />
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isResidential:
                this.selectedbuildingtype == "residential" ? true : false
        };
    },
    props: [
        "title",
        "streetAddressName",
        "cityName",
        "stateName",
        "zipCodeName",
        "unitNumberName",
        "buildingNumberName",
        "gateCodeName",
        "buildingTypeName",
        "residentialTypeName",
        "streetAddressVal",
        "cityVal",
        "stateVal",
        "zipCodeVal",
        "unitNumberVal",
        "buildingNumberVal",
        "gateCodeVal",

        "residentialTypeVal",
        "selectedbuildingtype"
    ],
    methods: {
        hideResidentialOptions() {
            this.isResidential = false;
        },
        showResidentialOptions() {
            this.isResidential = true;
        }
    }
};
</script>

<style lang="scss">
$blue: #22aee4;
$white: #ffffff;
$black: #000000;
$text-grey: #00000066;

.AddressInputsContainer {
    width: 100%;
    .title {
        font-size: 16px;
        font-family: "Lato-Bold";
        margin-bottom: 18px;
        color: $black;
    }

    .filter-options {
        width: 100%;
        height: 24px;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        margin-bottom: 15px;
        .filter {
            margin: 0 20px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            .radio {
                width: 24px;
                height: 24px;
                color: $black;
            }
            .filter-label {
                margin-left: 24px;
                font-size: 14px;
                width: 70px;
                color: $black;
            }
        }
    }

    .inputs-container {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        flex-wrap: wrap;

        margin-bottom: 36px;
        .input {
            color: $black;
            height: 45px;
            background: $white;
            padding: 14px 24px;
            border-radius: 23px;
            font-size: 14px;
            margin: 12px 8px;
            width: 300px;
        }
    }
}
</style>

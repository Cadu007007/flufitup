<template>
    <div class="container">
        <div class="car-details-container">
            <p class="title">Assignments</p>

            <div class="container">
                <div class="left"></div>

                <div class="right">
                    <div class="info-container">
                        <p class="title">Job</p>
                        <select
                            class="select2"
                            style="width: 400px"
                            name="job"
                            multiple="multiple"
                        >
                            <option value="1">Sorting</option>
                            <option value="2">Washing</option>
                            <option value="3">Drying</option>
                            <option value="4">Folding</option>
                            <option value="5">Packaging</option>
                            <option value="6">Dry Cleaning</option>
                        </select>
                    </div>
                    <div class="info-container">
                        <p class="title">Work Location</p>
                        <select
                            class="select2"
                            style="width: 400px"
                            name="zones"
                            multiple="multiple"
                        >
                            <option value="1">Location 1</option>
                            <option value="2">Location 2</option>
                        </select>
                    </div>

                    <div class="info-container">
                        <p class="title">Work Shift</p>
                        <select
                            class="select2"
                            style="width: 400px"
                            name="zones"
                            multiple="multiple"
                        >
                            <option value="1">Morning</option>
                            <option value="2">Noon</option>
                            <option value="3">Night</option>
                        </select>
                    </div>

                    <div class="info-container">
                        <p class="title">Notes</p>
                        <input
                            type="text"
                            class="input"
                            name="notes"
                            placeholder="Lorem Ipsum is simply dummy"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey: #eef2f4;
$blue: #22aee4;
$black: #000;
$green: #00c319;
$red: red;

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
        .userimage {
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
        margin-left: 60px;
        .info-container {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
            margin: 20px auto;
            .title {
                width: 150px;
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
.car-details-container {
    .title {
        font-size: 18px;
        font-family: "Open-Sans-Bold";
        color: $blue;
    }
}
</style>

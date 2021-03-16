<template>
    <div class="NumberOfOrdersCard">
        <p class="title">Number Of Pickups Per Day</p>
        <p class="value">{{ value }}</p>
        <p class="edit" @click="$emit('open-orders-number-modal')">Edit</p>
        <input
            class="date-input"
            type="date"
            v-model="effectiveDate"
            name="effective_date"
            @change="$emit('date-changed', effectiveDate)"
        />
        <button class="save-button" type="submit">Save</button>
    </div>
</template>

<script>
export default {
    props: ["value"],
    data() {
        return {
            effectiveDate: ""
        };
    }
};
</script>

<style lang="scss">
$white: #fff;
$grey: #00000080;
$black: #000;
$orange: #ffa800;
.NumberOfOrdersCard {
    background: $white;
    width: 260px;
    height: 250px;
    box-shadow: 0px 0px 10px #00000033;
    border-radius: 20px;
    border: 2px solid #f9f9f9;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    align-items: center;
    padding: 10px;
    .title {
        color: $black;
        font-family: "Open-Sans-Semibold";
        font-size: 14px;
        text-align: center;
    }
    .value {
        color: $orange;
        font-family: "Open-Sans-Bold";
        font-size: 24px;
        height: 35px;
    }
    .edit {
        color: $grey;
        font-family: "Open-Sans-Semibold";
        font-size: 12px;
        cursor: pointer;
    }
    .date-input {
        border: 1px solid #ccc;
        padding: 5px;
        width: 150px;
        text-align: center;
        margin-top: 10px;
        border-radius: 10px;
    }

    .save-button {
        margin: 20px auto 10px auto;
        padding: 5px 40px;
        height: 45px;
        border-radius: 25px;
        background: #22aee4;
        color: #fff;
        font-size: 18px;
    }
}
</style>

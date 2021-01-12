<template>
    <div class="Financials">
        <p class="title">Financials</p>
        <div class="row">
            <p class="label">Tips</p>
            <input
                class="financials-input"
                type="number"
                min="0"
                name="tips"
                id=""
                placeholder="tips"
                :value="tips"
            />
        </div>
        <div class="row">
            <p class="label">Bonus</p>
            <input
                class="financials-input"
                type="number"
                min="0"
                name="bonus"
                id=""
                placeholder="bonus"
                :value="bonus"
            />
        </div>
    </div>
</template>

<script>
export default {
    props: ["tips", "bonus"]
};
</script>

<style lang="scss">
.Financials {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    position: relative;
    margin-bottom: 10px;

    .title{
        margin: 20px 0;
        font-size: 16px;
        font-family: 'Open-Sans-Bold';
        color: #000;
    }
    .row {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        margin-left: 300px;

    }
    .label{
        width: 100px;
        font-family: 'Open-Sans-Semibold';
    }
    .financials-input {
        width: 300px;
        height: 45px;
        background: #f9f9f9;
        padding: 13px 24px;
        border: 1px solid #ededed;
        border-radius: 7px;
        margin: 6px 0;
    }
    .delete {
        position: absolute;
        top: 47px;
        left: 525px;
    }
}
</style>

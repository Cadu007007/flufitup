<template>
<form :action="walletroute">

    <div class="WalletModal">
        <div class="darker" @click="$emit('hide-modal')"></div>
        <div class="card">
            <p class="title">Username Wallet</p>
            <input
                type="number"
                class="amount"
                name="wallet"
                :value="walletvalue"
            />

            <button class="submit">Submit</button>
        </div>
    </div>
</form>
</template>

<script>
export default {
    props: ["walletroute","walletvalue"]
};
</script>

<style lang="scss">
$white: #f9f9f9;
$grey: #e8ecf3;
$blue: #22aee4;
$grey-text: #acacac;
.WalletModal {
    .darker {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba($color: #000000, $alpha: 0.4);
        z-index: 2;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .card {
        position: absolute;
        z-index: 3;
        top: 30%;
        transform: translateY(-50%);
        left: 50%;
        transform: translateX(-50%);
        width: 500px;
        height: 220px;
        background: $grey;
        border: 1px solid $white;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        padding: 24px;
        .title {
            font-size: 16px;
            color: $blue;
            font-family: "Open-Sans-Bold";
        }
        .submit {
            width: 200px;
            height: 40px;
            background: #22aee4 0% 0% no-repeat padding-box;
            box-shadow: 2px 2px 4px #00000033;
            border-radius: 35px;
            font-size: 18px;
            color: $white;
        }

        .amount {
            width: 352px;
            background: $white;
            margin: 24px 0;
            font-size: 14px;
            font-family: "Open-Sans-Regular";
            text-align: center;

            height: 40px;
            color: #000;
            font-size: 25px;
            font-weight: bold;
        }
    }
}
</style>

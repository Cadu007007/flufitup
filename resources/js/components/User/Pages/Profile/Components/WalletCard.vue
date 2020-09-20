<template>
  <div class="WalletCard">
    <div class="title">Wallet</div>
    <div class="value" :class="value >= 0  ? 'green' : 'red'">{{value}}</div>
    <div class="currency" :class="value >= 0 ? 'green' : 'red'">{{ currency }}</div>
  </div>
</template>

<script>
export default {
    props:['value','currency']
}
</script>

<style lang="scss">

$white: #ffffff;
$red: #FF0000CC;
$green: #00C319;
$blue: #22AEE4;

.WalletCard{
    background: $white;
    width: 490px;
    height: 129px;
    margin-top: 24px;
    border: 1px solid #E7E7E7;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    padding: 12px 0;
    .title{
        font-size: 16px;
        color: $blue;
        
        font-family: 'Lato-Bold';
    }
    .value{
        font-size: 30px;
        font-family: 'Lato-Medium';
        &.green{
        color: $green;
        }
        &.red{
        color: $red;
        }
    }
    .currency{
        font-family: 'Lato-Bold';
        font-size: 20px;
    &.green{
        color: $green;
        }
        &.red{

        color: $red;
        }
    }
}
</style>
<template>
<div class="OnlinePayment">
  <div class="page-header">
    <p class="title">{{title}}</p>
    <p class="date">{{date}}</p>
  </div>

<form :action="formactionroute" method="post">
    <input type="hidden" :value="csrf" name="_token"/>

<div class="promo-code">
    <input type="text" class="promocode" placeholder="Enter Your promo code" name="promocode">
    <button class="promocode-button" type="button">Redeem</button>
</div>

<div class="tip-driver">
    <p class="title">Tip Driver</p>
    <select class="tip-driver-select" name="tip_driver">
        <option value="">No.</option>
        <option value="1">Value 1</option>
    </select>
</div>

<div class="payment-card-container">
    <p class="title">Add your Credit Card details</p>
    <div class="payment-inputs">
        <Smart-Input-Container 
        title="Card Holder Name"
        name="card_holder_name"
        placeholder="Card Holder Name"
        type="text"
        />
        
         <Smart-Input-Container 
        title="Card Number"
        name="card_number"
        placeholder="Card Number"
        @input-keyup="formatCardNumber"
        :inputid="cardNumberId"
        type="text"
        />
        
        <Smart-Input-Container 
        title="CVV"
        name="ccv"
        placeholder="CVV"
        @input-keyup="formatCVV"
        :inputid="CVVId"
        type="text"
        maxlength=3
        />
        
         <Smart-Input-Container 
        title="Expiration Date"
        name="card_expire_date"
        placeholder="MM / YY"
        type="text"
        maxlength=5
        @input-keyup="formatExpirDate"
        :inputid="expireDateId"
        />


    </div>
</div>

    <div class="button-container">
        <button class="button-payment-button">
            <p class="left">
                Place Order
            </p>
            <p class="right">
                Total Price : 80 $
            </p>
        </button>
    </div>
</form>

</div>

</template>


<script>
import SmartInputContainer from '../../Components/SmartInputContainer'

export default {
  data() {
    return {
      title: 'Online Payment',
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      expireDateId: 'expireDateId',
      CVVId: 'CVVId',
      cardNumberId: 'cardNumberId'
    }
  },
  props: ['date','formactionroute'],
  components:{
      SmartInputContainer
  },
  methods: {
      formatExpirDate(){
          var digit1;
          var digit2;
          var digit3;
          var digit4;

          var expireDateInput = document.getElementById(this.expireDateId)

          expireDateInput.value = this.olnyNumbers(expireDateInput.value)

          if(expireDateInput.value.length >= 4){
            digit1 =  expireDateInput.value[0]
            digit2 =  expireDateInput.value[1]
            digit3 =  expireDateInput.value[2]
            digit4 =  expireDateInput.value[3]

            if(Number(digit1) > 1) {
                digit1 = 1
                digit2 = 2
            }
            else if (Number(digit1) == 1 && Number(digit2) >2) {
                digit1 = 1
                digit2 = 2
            } 

            if(!expireDateInput.value.includes('/')){
                expireDateInput.value = digit1.toString() + digit2.toString() +'/' + digit3.toString() + digit4.toString()
            }
          }
      
      },
      formatCVV(){
          var CVVInput = document.getElementById(this.CVVId)
          CVVInput.value = this.olnyNumbers(CVVInput.value)

      },
      formatCardNumber(){
          var cardNumberInput = document.getElementById(this.cardNumberId)
          cardNumberInput.value = this.olnyNumbers(cardNumberInput.value)
      },
      olnyNumbers(number){
          if(number.length > 0){
                for(var i=0; i <= number.length; i++){
                    if(isNaN(number[i])){
                        number = number.replace(number[i], '')
                    }
                }
                for(var i=number.length; i >= 0; i--){
                    if(isNaN(number[i])){
                        number = number.replace(number[i], '')
                    }
                }
                return number;
          } else {
                return '';
          }

      }
  },
}
</script>
<style lang="scss">
$white: #fff;
$orange: #FDBD42;
$text-grey: #00000066;
$blue: #15B2D3;

$shadow:0px 3px 6px #00000033;

.OnlinePayment{
  padding: 0 140px 0 16px;
        .page-header{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        .title{
        margin: 26px 0;
        font-size: 12px;
        font-weight: bold;
        }
        .date{
        font-size: 10px;
        color: $text-grey;
        }

    }

    .promo-code {
            position: relative;
            width: 444px;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: $shadow;
            .promocode {
                width: 90%;
                height: 50px;
                border-radius: 10px;
                padding: 0 30px;
                font-size: 16px;
            }
            .promocode-button {
                font-family: 'Lato-Bold';
                position: absolute;
                border-radius: 10px;
                background: $orange;
                color: $white;
                right: 0px;
                width: 150px;
                height: 50px;
                font-size: 15px;
            }
        }

        .tip-driver{
            width: 630px;
            margin: 36px auto 36px 100px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            .title{
                font-size: 16px;
                color: $blue;
            }
            .tip-driver-select{
                width: 444px;
                height: 35px;
                border-radius: 20px;
                margin: 36px 0 0 auto;
                padding: 7px 24px;
                font-size: 14px;
                background: $white;
                color: $text-grey;
                box-shadow: $shadow;
                
            }
        }
        .payment-card-container{
            width: 630px;
            margin: 36px auto 36px 100px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            .title{
                font-size: 16px;
                color: $blue;
            }
            .payment-inputs{
                width: 628px;
                height: 194px;
                margin-top: 36px;
                margin-left: 100px;
                display: grid;
                grid-template-columns: repeat(2,1fr);
                column-gap: 100px;
                row-gap: 20px;
                .SmartInputContainer{
                    margin-bottom: 20px;
                    .input{
                        height: 35px;
                        box-shadow: $shadow;
                    }
                }
            }
            
        }

        .button-container{
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 70px auto 0 auto;
                .button-payment-button{
                    display: flex;
                    flex-direction: row;
                    justify-content: space-between;
                    align-items: center;
                    width: 444px;
                    height: 50px;
                    border-radius: 35px;
                    box-shadow: $shadow;
                    background: $blue;
                    color: $white;
                    padding: 16px 24px;
                    font-size: 16px;
                    .right{
                        font-family: 'Lato-Bold';
                    }
                }
            }
}
</style>


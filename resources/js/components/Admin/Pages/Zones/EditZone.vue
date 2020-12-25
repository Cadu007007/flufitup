<template>
  <div class="EditZone">
    <div class="page-header">
        <p class="title">{{title}}</p>
        <p class="date">{{date}}</p>
    </div>
    <div class="zone-cities-container">
        <div class="zone-name">
            <p class="title">Zone Name:</p>
            <input type="text" class="zone-name-input" name="zone_name" placeholder="Zone Name">
        </div>
        <div class="zone-cities-container">
            <div class="zone-city">
            <div class="first-row">
                <p class="title">Zone Cities:</p>
                <div class="city-row">
                    <select class="zone-name-input" name="city[]">
                        <option>City Name</option>
                    </select>
                    <span class="delete-city">X</span>
                </div>
            </div>
            <div class="cities">
                <div class="city-row" v-for="(input,index) in inputs" :key="index">
                    <select class="zone-name-input" name="city[]">
                        <option>City Name</option>
                    </select>
                    <span class="delete-city" @click="removeCityRow">X</span>

                </div>

                <p class="add-another-city" @click="inputs++">Add Another City</p>
            </div>
            </div>
        </div>
    </div>

    <div class="button-container">
        <button class="save-button">Save</button>
    </div>

  </div>
</template>

<script>
export default {
    props: ['title','date'],
    data() {
        return {
            inputs: 0
        }
    },
    methods: {
        removeCityRow(event){
            event.target.parentNode.remove()
        }
    },

}
</script>


<style lang="scss">
$text-grey: #00000080;
$orange: #FFA800;
$blue: #22aee4;

.PageContainer{
    padding: 0 !important;
}
.EditZone{
    width: 100%;
    height: 80vh;
    .page-header{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 0 24px;
        .title{
            margin: 26px 0;
            font-size: 21px;
            font-family: 'Open-Sans-SemiBold';
        }
        .date{
            font-size: 12px;
            color: $text-grey;
            font-family: 'Open-Sans-Regular';
        }
    }
    .zone-cities-container{
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        .zone-name{
            width: 812px;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            margin: 0 auto;
            .title{
                color: $text-grey;
                font-size: 16px;
            }
            .zone-name-input{           
                width: 628px;
                background: #F9F9F9;
                border: 2px solid #EDEDED;
                border-radius: 7px;
                padding: 12px;
            }
        }
        .zone-cities-container{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 30px auto;
            .zone-city{
            width: 812px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            margin: 0 auto;
            position: relative;
            .first-row {
                width: 812px;
                display: flex;
                flex-direction: row;
                justify-content: space-around;
                align-items: center;
                margin: 0 auto;
            }

               .title{
                color: $text-grey;
                font-size: 16px;
            }
            
            .city-row{
                position: relative;
                .delete-city{
                    position: absolute;
                    top: 10px;
                    right: -25px;
                }
            }

            .cities{
                display: flex;
                flex-direction: column;
                justify-content: center;
                width: 100%;
                align-items: flex-end;
                margin-right: 50px;
                .city-row{
                    margin-top: 10px;
                .delete-city{
                    position: absolute;
                    top: 10px;
                    right: -25px;
                }
            }
            .add-another-city{
                width: 628px;
                text-align: center;
                margin-top: 20px;
                font-size: 16px;
                color: $orange;
                font-family: 'Open-Sans-SemiBold';
                cursor: pointer;
            }
            }
            .zone-name-input{           
                width: 628px;
                background: #F9F9F9;
                border: 2px solid #EDEDED;
                border-radius: 7px;
                padding: 12px;
        }
            }
        }
    }

.button-container{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin: 30px auto;
        .save-button{
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
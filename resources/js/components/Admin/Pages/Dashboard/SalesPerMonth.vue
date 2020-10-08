<template>
  <div class="SalesPerMonth">  
    <div class="page-header">
        <p class="title">{{title}}</p>
        <p class="date">{{date}}</p>
    </div>

    <div class="calendar-container">
        <p class="calendar-title">Calendar Control</p>
        <vue-event-calendar :events="selecteddates"></vue-event-calendar>
    </div>
  </div>
</template>

<script>
export default {
       data () {
            return {
            modalstate: false,
            }
       },
    props: ['title','date','selecteddates'],
    methods: {
    },

}
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey:#EEF2F4;
$blue: #22AEE4;

$low: #E5D5B7;
$high: #F4C467;

.SalesPerMonth{
    width: 100%;
    height: 100%;
    .page-header{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        .title{
            margin: 26px 0 10px 0;
            font-size: 21px;
            font-family: 'Open-Sans-SemiBold';
        }
        .date{
            font-size: 12px;
            color: $text-grey;
            font-family: 'Open-Sans-Regular';
        }

    }

    .calendar-container{
    width: 800px;
    height: 450px;
    box-shadow: 0px 0px 10px #00000033;
    border-radius: 30px;
    padding: 24px;
    margin: 20px auto;
    .calendar-title{
        color: $blue;
        font-family: 'Open-Sans-Bold';
        font-size: 16px;
        margin-left: 25px;
    }
    .cal-wrapper{
        padding: 0 !important;
        margin: 10px auto;
        width: 100%;

        .cal-header{
            font-family: 'Open-Sans-Bold';
        }
    }
    .high {
        .date-num{
            color: #000 !important;
        }
        .is-event{
            background: $high !important;
            border: none !important;
        }

    }

    .low {
        .date-num{
            color: #000 !important;
        }
        .is-event{
            background: $low !important;
            border: none !important;
        }

    }
    .events-wrapper{
        display: none !important;
    }
 }

}
</style>
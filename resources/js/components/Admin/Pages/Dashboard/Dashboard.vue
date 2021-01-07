<template>
  <div class="Dashboard">  
    <div class="page-header">
        <p class="title">{{title}}</p>
        <p class="date">{{date}}</p>
    </div>
    <div class="items-container">
        <Dashboard-Item
        :showvalue = true
        class="DashboardItem"
        :value="totalclients"
        title="Total Clients"
        color="#FFA800"
        :gotoroute="totalclientsroute"
        />
        
        <Dashboard-Item
        class="DashboardItem"
        :value="newclients"
        :showvalue = true
        title="New Clients"
        color="#22AEE4"
        :gotoroute="newclientsroute"
        />
        <Dashboard-Item
        :showvalue = false
        class="DashboardItem"
        :value="salespermonth"
        title="Sales per Month"
        color="#22AEE4"
        :gotoroute="salespermonthroute"
        />
        
        <Dashboard-Item
        class="DashboardItem"
        :showvalue = false
        :value="salesperpackage"
        title="Sales per Package"
        color="#22AEE4"
        :gotoroute="salesperpackageroute"
        />
        <Dashboard-Item
        class="DashboardItem"
        :showvalue = false
        :value="salespercity"
        title="Sales per City"
        color="#22AEE4"
        :gotoroute="userspercityroute"
        />
        
        <Dashboard-Item
        class="DashboardItem"
        :showvalue = true
        :value="cancellationrequests"
        title="Cancellation Requests"
        color="#0000004D"
        :gotoroute="cancellationrequestsroute"

        />
    </div>

    <div class="flex-row">
        <div class="calendar-container">
           <!-- <p class="calendar-title">Calendar Control</p> -->
            <vue-event-calendar :events="selectedDates"></vue-event-calendar>
        </div>
        <NumberOfOrdersCard
        class="number-of-orders-card"
        :value="ordersnumber"
        @open-orders-number-modal="showModal"
        @date-changed="effectiveDateSelected"
        />
    </div>


    <EditNumberOfOrdersCard
    v-show="modalstate"
    @hide-modal="hideModal"
    :value="ordersnumber"
    />
  </div>
</template>

<script>
import DashboardItem from './Components/DashboardItem'
import NumberOfOrdersCard from './Components/NumberOfOrdersCard'
import EditNumberOfOrdersCard from './Components/EditNumberOfOrdersCard'
export default {
    props: ['title','date',
    'totalclients',
    'newclients',
    'salespermonth',
    'salesperpackage',
    'salespercity',
    'cancellationrequests',
    'totalclientsroute',
    'newclientsroute',
    'salespermonthroute',
    'salesperpackageroute',
    'userspercityroute',
    'cancellationrequestsroute',
    'ordersnumber'
    ],
    components: {
        DashboardItem,
        NumberOfOrdersCard,
        EditNumberOfOrdersCard,
    },
      data () {
    return {
      modalstate: false,
      selectedDates: [{
        date: '2020/10/6', // Required
        title: 'Foo', // Required
        customClass: 'blue highlight' // Custom classes to an calendar cell
      }, {
        date: '2020/10/15',
        title: 'Bar',
        desc: 'description',
        customClass: 'orange highlight' // Custom classes to an calendar cell
      },
      
      ]
    }
  },
  methods: {
      showModal(){
          this.modalstate = true
      },
      hideModal(){
          this.modalstate = false
      },
      effectiveDateSelected(dateValue){
          let year= dateValue.substr(0,4)
          let month= dateValue.substr(5,2)
          let day= dateValue.substr(8,2)
          let formatedDate = `${year+'/'+month+'/'+day}`
          
          this.selectedDates.push({date: formatedDate ,title: 'Effective Date',customClass: 'effective-date highlight'})
      }
  },

}
</script>

<style lang="scss">
$text-grey: #00000066;
$blue: #22AEE4;

.Dashboard{
    width: 100%;
    min-height: 100%;
    overflow: hidden;
    .page-header{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        .title{
            margin: 26px 0 26px 0;
            font-size: 21px;
            font-family: 'Open-Sans-SemiBold';
        }
        .date{
            font-size: 12px;
            color: $text-grey;
            font-family: 'Open-Sans-Regular';
        }
    }

    .items-container{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-items: center;
        padding: 0 20px;
        .DashboardItem{
            margin: 2px 8px;
        }
    }


.flex-row{
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: flex-start;
    margin: 30px auto 20px 24px;

}
/* Handle Calendar */
.calendar-container{
    width: 550px;
    height: 440px;
    box-shadow: 0px 0px 10px #00000033;
    border-radius: 30px;
    padding: 24px;
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
    .blue {
        .date-num{
            color: #fff !important;
        }
        .is-event{
            background: blue !important;
            border: none !important;
        }

    }

    .orange {
        .date-num{
            color: #fff !important;
        }
        .is-event{
            background: orange !important;
            border: none !important;
        }

    }
    .effective-date {
        .date-num{
            color: #fff !important;
        }
        .is-event{
            background: #aaa !important;
            border: none !important;
        }

    }
    .events-wrapper{
        display: none !important;
    }
}

/* Number Of Orders */
.number-of-orders-card{
    margin-left: 40px;
}
/* XX Number Of Orders XX */

/* XX Handle Calendar XX */

}
</style>
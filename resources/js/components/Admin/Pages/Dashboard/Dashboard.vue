<template>
  <div class="Dashboard">  
    <div class="page-header">
        <p class="title">{{title}}</p>
        <p class="date">{{date}}</p>
    </div>
    <div class="items-container">
        <Dashboard-Item
        class="DashboardItem"
        :value="totalclients"
        title="Total Clients"
        color="#FFA800"
        :gotoroute="totalclientsroute"
        />
        
        <Dashboard-Item
        class="DashboardItem"
        :value="newclients"
        title="New Clients"
        color="#22AEE4"
        :gotoroute="newclientsroute"
        />
        <Dashboard-Item
        class="DashboardItem"
        :value="salespermonth"
        title="Sales per Month"
        color="#22AEE4"
        :gotoroute="salespermonthroute"
        />
        
        <Dashboard-Item
        class="DashboardItem"
        :value="salesperpackage"
        title="Sales per Package"
        color="#22AEE4"
        :gotoroute="salesperpackageroute"
        />
        <Dashboard-Item
        class="DashboardItem"
        :value="userspercity"
        title="Users per City"
        color="#22AEE4"
        :gotoroute="userspercityroute"
        />
        
        <Dashboard-Item
        class="DashboardItem"
        :value="cancelledorders"
        title="Cancelled Orders"
        color="#0000004D"
        :gotoroute="cancelledordersroute"

        />
    </div>

    <div class="flex-row">
        <div class="calendar-container">
            <p class="calendar-title">Calendar Control</p>
            <vue-event-calendar :events="selectedDates"></vue-event-calendar>
        </div>
        <NumberOfOrdersCard
        class="number-of-orders-card"
        :value="ordersnumber"
        @open-orders-number-modal="showModal"
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
    'userspercity',
    'cancelledorders',
    'totalclientsroute',
    'newclientsroute',
    'salespermonthroute',
    'salesperpackageroute',
    'userspercityroute',
    'cancelledordersroute',
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
    height: 400px;
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
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
        />
        
        <Dashboard-Item
        class="DashboardItem"
        :value="newclients"
        title="New Clients"
        color="#22AEE4"
        />
        <Dashboard-Item
        class="DashboardItem"
        :value="salespermonth"
        title="Sales per Month"
        color="#22AEE4"
        />
        
        <Dashboard-Item
        class="DashboardItem"
        :value="salesperpackage"
        title="Sales per Package"
        color="#22AEE4"
        />
        <Dashboard-Item
        class="DashboardItem"
        :value="userspercity"
        title="Users per City"
        color="#22AEE4"
        />
        
        <Dashboard-Item
        class="DashboardItem"
        :value="cancelledorders"
        title="Cancelled Orders"
        color="#0000004D"
        />
    </div>
    
  </div>
</template>

<script>
import DashboardItem from './Components/DashboardItem'
export default {
    props: ['title','date',
    'totalclients',
    'newclients',
    'salespermonth',
    'salesperpackage',
    'userspercity',
    'cancelledorders'],
    components: {
        DashboardItem
    }

}
</script>

<style lang="scss">
$text-grey: #00000066;

.Dashboard{
    width: 100%;
    height: 100%;
    .page-header{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
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

    .items-container{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        .DashboardItem{
            margin: 4px 8px;
        }
    }
}
</style>
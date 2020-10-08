<template>
  <div class="CancelledOrders">  
    <div class="page-header">
        <p class="title">{{title}}</p>
        <p class="date">{{date}}</p>
    </div>

  </div>
</template>

<script>
export default {
    props: ['title','date'],
    methods: {
    },

}
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey:#EEF2F4;
$blue: #22AEE4;

.CancelledOrders{
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
}
</style>
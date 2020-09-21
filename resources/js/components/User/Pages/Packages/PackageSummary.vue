<template>
<div class="PackageSummary">
  <div class="page-header">
    <p class="title">{{title}}</p>
    <p class="date">{{date}}</p>
  </div>

  <div class="page-container">

    <PackageDetailsCard
    class="package-details"
    :package="package"
    />

    <PackagePriceCard
    class="package-price"
    :price="package[0].price"
    :currency="package[0].currency"
     />

  </div>
</div>

</template>


<script>
import PackageDetailsCard from './Components/PackageDetailsCard'
import PackagePriceCard from './Components/PackagePriceCard'

export default {
  data() {
    return {
      title: 'Package Summary'
    }
  },
  props: ['date','package'],
  components:{
    PackageDetailsCard,
    PackagePriceCard
  }


}
</script>
<style lang="scss">
$text-grey: #00000066;


.PackageSummary{
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

.page-container{
  display: flex;
  flex-direction: row;
  justify-content: flex-start;
  align-items: center;
  flex-wrap: wrap;
  .package-details{
    margin: 8px 8px 8px 0;
  }
  .package-price{
    margin: 8px 0 8px 4px;
  }
}

}
</style>


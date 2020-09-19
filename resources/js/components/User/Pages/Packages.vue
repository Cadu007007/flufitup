<template>
<div class="Packages">
  <div class="page-header">
    <p class="title">{{title}}</p>
    <p class="date">{{date}}</p>
  </div>
  <div class="page-title">
    <p class="title">Choose from our service offers</p>
  </div>
  <p class="packages-title">
  Ad Hoc Packages
  </p>

  <div class="packages-container">
    <PackageContainer v-for="(item,index) in packagesadhoclist" :key="index"
    :title="item.title"
    :price="item.price"
    :description="item.description"
    :button="item.button"
    />
    
  </div>


<p class="packages-title">
    Bi-Weekly Packages
  </p>

  <div class="packages-container">
    <PackageContainer v-for="(item,index) in packagebiweeklylist" :key="index"
    :title="item.title"
    :price="item.price"
    :description="item.description"
    :button="item.button"
    />
  </div>
    
<p class="packages-title">
Monthly Packages
  </p>

  <div class="packages-container">
    <PackageContainer v-for="(item,index) in packagesmonthlylist" :key="index"
    :title="item.title"
    :price="item.price"
    :description="item.description"
    :button="item.button"
    />
    
  </div>

    
<p class="packages-title">
Create Your Package
  </p>
 
  <div class="packages-container">
    <PackageContainer
    title="Create your package"
    description="Lorem Ipsum is simply dummy text of the printing and typesetting industry"
    button="Create"
    />
    
  </div>




</div>


</template>

<style lang="scss">
$text-grey: #00000066;
$blue: #22AEE4;
$black: #000000;

.Packages{
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
.packages-title{
  font-size: 18px;
  font-family: 'Lato-Bold';
  color: $black;
  margin-top: 20px;
margin-bottom: 30px;
}
.page-title{
  height: 25px;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  .title{
    font-size: 21px;
    color: $blue;
    margin-bottom: 8px;
  }
}
.packages-container{
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: flex-start;
  align-items: center;
}
}
</style>

<script>
import PackageContainer from '../Components/PackageContainer'
export default {
  data() {
    return {
      title: 'Packages',
    }
  },
  props: {
        packagesadhoclist: Array,
        packagebiweeklylist: Array,
        packagesmonthlylist: Array,
        date: String,
  },
  components:{
    PackageContainer
  }
}
</script>

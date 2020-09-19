<template>
<div class="Packages">
  <div class="page-header">
    <p class="title">{{title}}</p>
    <p class="date">{{date}}</p>
  </div>
  <div class="page-title">
    <p class="title">Choose from our service offers</p>
  </div>
  <div class="packages-container">
    <PackageContainer v-for="(item,index) in packageslist" :key="index"
    :title=item.title
    :price=item.price
    :description=item.description
    :button=item.button
    />
  </div>
</div>


</template>

<style lang="scss">
$text-grey: #00000066;
$blue: #22AEE4;


.Packages{
  padding: 0 139px 0 16px;
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
      packages:[
        {title: 'Ad Hoc', price: '75 $', description: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',button:'Subscribe'},
        {title: 'Ad Hoc - Heavy', price: '75 $', description: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',button:'Subscribe'},
        {title: 'Bi-Weekly', price: '75 $', description: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',button:'Subscribe'},
        {title: 'Bi-Weekly – Big Job', price: '75 $', description: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',button:'Subscribe'},
        {title: 'Monthly', price: '75 $', description: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',button:'Subscribe'},
        {title: 'Monthly - Busy', price: '75 $', description: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',button:'Subscribe'},
        {title: 'Monthly - Heavy', price: '75 $', description: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',button:'Subscribe'},
        {title: 'Create your package', price: '', description: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',button:'Create'},
      ],
    }
  },
  props: {
        packageslist: Array,
        date: String,
  },
  components:{
    PackageContainer
  }
}
</script>

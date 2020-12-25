<template>
  <div class="AdminPackageDetail">
    <p class="name">{{ name }}</p>
    <p class="value"> {{value}}</p>
 </div>
</template>

<script>
export default {
props:['name','value']
}
</script>

<style lang="scss">
$black: #000000;

.AdminPackageDetail{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: flex-start;
        width: 100%;
        margin: 6px 0;
        .name{
          font-family: 'Lato-Bold';
          color: $black;
          font-size: 16px;
        }
        .value{
          text-align: right;
          font-size: 16px;
          color: $black;
          width: 300px;
        }
}
</style>
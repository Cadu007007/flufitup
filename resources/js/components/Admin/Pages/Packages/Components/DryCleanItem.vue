<template>
  <div class="DryCleanItem">
    <input class="dry-clean-input" type="text" name="label" id="" placeholder="Label" :value="label">
    <input class="dry-clean-input" type="text" name="price" id="" placeholder="Price" :value="price">
    <span class="delete" @click="$emit('delete-item')"> <img src="/images/admin/icons/notification-cancel.svg" alt=""> </span>
  </div>
</template>

<script>
export default {
    props:['label','price']
}
</script>

<style lang="scss">
.DryCleanItem{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    position: relative;
    margin-bottom: 10px;;
    .dry-clean-input{
        width: 512px;
        height: 45px;
        background: #F9F9F9;
        padding: 13px 24px;
        border: 1px solid #EDEDED;
        border-radius: 7px;
        margin: 6px 0;
    }
    .delete{
        position: absolute;
        top: 47px;
        left: 525px;
    }
}
</style>
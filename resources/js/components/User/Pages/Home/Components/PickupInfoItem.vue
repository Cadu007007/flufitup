<template>
  <div class="PickupInfoItem">
    <div class="pickup-info">
        <p class="title">{{title}}</p>
        <p class="value">{{value}}</p>
    </div>
</div>
</template>

<script>
export default {
props: ['title','value']
}
</script>

<style lang="scss">
$title-color: #00000066;

.PickupInfoItem{
                padding: 0 7px;
                margin: 20px auto;
                .pickup-info{
                    display: flex;
                    flex-direction: row;
                    justify-content: space-between;
                    align-items: center;
                    margin: 10px 0;
                    font-size: 11px;
                    .title{
                        font-family: 'Lato-Bold';
                        color: $title-color;
                    }
                    .value{
                        color: $title-color;

                    }
                }
            }
</style>
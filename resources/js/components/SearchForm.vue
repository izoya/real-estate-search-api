<template>
    <el-form ref="form" :model="form" label-width="120px">
        <el-form-item label="Property name">
            <el-input v-model="form.name" name="name"></el-input>
        </el-form-item>
        <el-form-item label="Bedrooms">
            <el-select v-model="form.bedrooms" name="bedrooms" placeholder="select bedroom quantity">
                <el-option v-for="item in 5" :label="item" :value="item" v-bind:key="item"></el-option>
            </el-select>
        </el-form-item>
        <el-form-item label="Bathrooms">
            <el-select v-model="form.bathrooms" name="bathrooms" placeholder="select bathrooms quantity">
                <el-option v-for="item in 5" :label="item" :value="item" v-bind:key="item"></el-option>
            </el-select>
        </el-form-item>
        <el-form-item label="Storeys">
            <el-select v-model="form.storeys" name="storeys" placeholder="how many storeys">
                <el-option v-for="item in 3" :label="item" :value="item" v-bind:key="item"></el-option>
            </el-select>
        </el-form-item>
        <el-form-item label="Garages">
            <el-select v-model="form.garages" name="garages" placeholder="select garages quantity">
                <el-option v-for="item in 3" :label="item" :value="item" v-bind:key="item"></el-option>
            </el-select>
        </el-form-item>
        <el-form-item label="Price">
            <el-slider v-model="form.price"
                       name="price_range"
                       range
                       :min="minPrice"
                       :max="maxPrice"
                       :step="sliderStep">
            </el-slider>
        </el-form-item>

        <el-form-item>
            <el-button type="primary" @click="onSubmit">Search</el-button>
        </el-form-item>
    </el-form>
</template>

<script>
export default {
    name: 'SearchForm',
    data: function () {
        return {
            form: {
                name: '',
                bedrooms: '',
                bathrooms: '',
                storeys: '',
                garages: '',
                price: [0, 0],
            },
            minPrice: 200000,
            maxPrice: 600000,
            sliderStep: 1000,
        }
    },
    methods: {
        onSubmit() {
            console.log(this.$refs.form.model);
        },
    },
    beforeMount() {
        this.form.price = [this.minPrice, this.maxPrice];
    },
};
</script>

<style scoped lang="sass">

</style>

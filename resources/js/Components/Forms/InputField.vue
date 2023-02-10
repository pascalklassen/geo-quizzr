<template>
    <div class="input-group" :class="{ 'has-validation': props.validation.$dirty }">
        <span v-if="props.prepend" class="input-group-text">{{ props.prepend }}</span>
        <div class="form-floating">
            <input
                :id="props.name"
                autocomplete="off"
                class="form-control"
                :class="{
                    'is-valid': props.validation.$dirty && !props.validation.$invalid,
                    'is-invalid': props.validation.$error
                }"
                :name="props.name"
                :placeholder="props.label"
                :type="props.type"
                :value="props.modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
            />
            <label :for="props.name">{{ props.label }}</label>
        </div>
        <div v-if="props.validation.$error" :class="{ 'd-block': props.validation.$error }" class="invalid-feedback">
            {{ props.validation.$errors.shift().$message }}
        </div>
        <div v-if="props.validation.$dirty && !props.validation.$invalid"
             :class="{ 'd-block': !props.validation.$error }" class="valid-feedback">
            Looks good!
        </div>
    </div>
</template>

<script setup>
const props = defineProps([
    'type',
    'name',
    'label',
    'prepend',
    'modelValue',
    'validation',
    'required'
])

defineEmits([
    'update:modelValue'
])
</script>

<style scoped>
</style>

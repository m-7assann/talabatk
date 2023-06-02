<template>
  <div class="">
    <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
      <div class="flex w-2/5">
        
        <div class="w-20">
          <img
            class="h-24"
            
            alt=""
          />
        </div>
        <div class="flex flex-col justify-between ml-4 flex-grow">
          <span class="font-bold text-sm">{{ item.name }}</span>
          <span
            class="text-red-500 text-xs"
            >{{ item.attributes.resturant }}</span
          >
          <form action="{{ route('cart.destroy', item.id) }}" method="POST">
            
            <button
              type="submit"
              class="font-semibold hover:text-red-500 text-gray-500 text-xs"
            >
              حذف
            </button>
          </form>
        </div>
      </div>
      <div class="flex justify-center w-1/5">
        <form action="{{ route('cart.update', item.id) }}" method="POST">
          
          <div class="flex">
            <input
              type="number"
              id="website-admin"
              class="
                rounded-none rounded-r-lg
                bg-gray-50
                border border-gray-300
                text-gray-900
                focus:ring-blue-500 focus:border-blue-500
                block
                flex-1
                min-w-0
                w-full
                text-sm
                border-gray-300
                p-2.5
              "
              :value="item.quantity"
              name="quantity"
            />
            <button
              type="submit"
              class="
                inline-flex
                items-center
                px-3
                text-sm text-gray-900
                bg-gray-200
                rounded-l-md
                border border-r-0 border-gray-300
              "
            >
              تعديل
            </button>
          </div>
        </form>
      </div>
      <span class="text-center w-1/5 font-semibold text-sm" id="price"
        >{{item.price}} شيكل</span
      >
      <span class="text-center w-1/5 font-semibold text-sm" id="total"
        >{{item.price * item.quantity}} شيكل</span
      >
    </div>
  </div>
</template>

<script>
export default {
  props: ["item"],
};
</script>
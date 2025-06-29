<section class="">
    <img src="{{ asset('assets/images/vector-4.svg') }}" class="absolute w-full h-auto -z-10" alt="vector-4" srcset="">
    @if ($booking->status == "pending")
        <div class="xl:mx-auto max-w-6xl px-5 xl:px-0 py-12 md:py-15">
            <div class="w-full flex flex-col items-center mt-2 lg:mt-8">
                <div class="text-center flex flex-col space-y-0.5 md:space-y-2">
                    <h3 class="text-3xl md:text-5xl font-semibold">Konfirmasi Pembayaran</h3>
                    <h5 class="text-base md:text-[20px] text-[#4B4B4B]">Silahkan lakukan pembayaran sebesar jumlah berikut:</h5>
                    <h4 class="text-2xl font-bold text-red-600">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</h4>
                    <h5 class="text-base md:text-[20px] text-[#4B4B4B]">Transfer ke bank berikut:</h5>
                    <div class="flex space-x-5 mt-10 mb-10">
                        <div class="flex flex-col items-start space-y-2">
                            <img src="{{ asset('assets/images/mandiri.png') }}" class="" alt="mandiri" srcset="">
                            <span class="text-sm text-[#4B4B4B]">008 1234-567-8912-34</span>
                            <span class="text-sm text-[#4B4B4B]">An. PT. Rental Mobil</span>
                        </div>

                        <div class="flex flex-col items-start space-y-2">
                            <img src="{{ asset('assets/images/bri.png') }}" class="" alt="bri" srcset="">
                            <span class="text-sm text-[#4B4B4B]">002 1234-5678-9122-345</span>
                            <span class="text-sm text-[#4B4B4B]">An. PT. Rental Mobil</span>
                        </div>

                        <div class="flex flex-col items-start space-y-2">
                            <img src="{{ asset('assets/images/bca.png') }}" class="" alt="bca" srcset="">
                            <span class="text-sm text-[#4B4B4B]">002 1234-5678-9122-345</span>
                            <span class="text-sm text-[#4B4B4B]">An. PT. Rental Mobil</span>
                        </div>
                    </div>
                    <h5 class="text-base md:text-[20px] text-[#4B4B4B]">Jika sudah melakukan pembayaran silahkan konfirmasi dengan mengklik tombol ini:</h5>
                    <form wire:submit.prevent="confirm">
                        <x-ui.button-primary
                            type="button"
                            wire:click="$set('idToConfirm', {{ $booking->id }})"
                            @click="$dispatch('open-modal-confirm-payment')"
                            class="w-fit mt-5 "
                        >
                            <span class="text-sm sm:text-xl">Konfirmasi Pembayaran</span>
                            <!-- <span wire:loading wire:target="save" class="text-sm sm:text-xl">Process...</span> -->
                        </x-ui.button-primary>
                    </form>
                </div>
            </div>
        </div>

        <x-ui.confirm-payment-modal 
            wireConfirm="confirm"
            title="Konfirmasi Pembayaran"
            message="Apakah anda yakin untuk konfirmasi pembayaran ini?"
        />
    @else
    <div class="xl:mx-auto max-w-6xl px-5 xl:px-0 py-12 md:py-20">
        <div class="w-full flex flex-col items-center mt-2 lg:mt-8">
            <div class="text-center flex flex-col space-y-0.5 md:space-y-2">
                <h3 class="text-3xl md:text-5xl font-semibold">Booking Berhasil</h3>
                <h5 class="text-base md:text-[20px] text-[#4B4B4B]">Terima kasih telah sewa mobil kami, tim kami akan menghubungi anda.</h5>
                
            </div>
        </div>
    </div>
    @endif
</section>

<section class="">
    <img src="{{ asset('assets/images/vector-4.svg') }}" class="absolute w-full h-auto -z-10" alt="vector-4" srcset="">
    @if ($booking->status == "pending")
        <div class="xl:mx-auto max-w-6xl px-5 xl:px-0 py-12 md:py-20">
            <div class="w-full flex flex-col items-center mt-2 lg:mt-8">
                <div class="text-center flex flex-col space-y-0.5 md:space-y-2">
                    <h3 class="text-3xl md:text-5xl font-semibold">Konfirmasi Pembayaran</h3>
                    <h5 class="text-base md:text-[20px] text-[#4B4B4B]">Silahkan lakukan pembayaran sebesar jumlah berikut:</h5>
                    <h4 class="text-2xl font-bold text-red-600">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</h4>
                    <h5 class="text-base md:text-[20px] text-[#4B4B4B]">Via transfer ke bank berikut:</h5>
                    <h5 class="text-base md:text-[20px] text-[#4B4B4B]">Jika sudah melakukan pembayaran silahkan konfirmasi dengan mengklik tombol berikut:</h5>
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
    @endif
    @if ($booking->status == "confirmed")
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

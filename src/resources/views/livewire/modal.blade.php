

<div>
    <button wire:click="openModal()" type="button" class="button js-modal-button px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
        詳細
    </button>
 
    @if($showModal)
        <div class="modal-container"><!-- モーダルウィンドウ本体の囲み -->
            <div class="modal-body">
                <button type="button" class="modal-close">close</button><!-- 閉じるボタン -->
                <div class="modal-content"><!-- コンテンツエリア -->
                    <div class="inn">
                        <span class="en">FREE</span>
                        <p class="txt">無料提案・相談もお気軽に！</p>
                    </div>
                    <div class="gray-bg">
                        <p class="txt">お客様のご要望をお聞かせください。<br>サイト制作の知識のある担当が無料で診断しご提案させて頂きます。</p>
                    </div>
                    <div class="btn-area">
                        <a href="">お問い合わせはこちらから</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

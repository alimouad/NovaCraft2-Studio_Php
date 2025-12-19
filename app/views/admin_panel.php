<div class="max-w-4xl mx-auto p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Recent Messages</h2>
    
    <div class="space-y-4">
        <?php foreach ($messages as $msgs => $msg): ?>
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-200">
            <div class="flex justify-between items-start mb-3">
                
                <div class="flex flex-col items-end text-right">
                    <span class="text-sm font-medium text-purple-600 bg-purple-50 px-2 py-1 rounded">
                        <i class="far fa-clock mr-1"></i>
                        <?= date('H:i', strtotime($msg['created_at'])) ?>
                    </span>
                    <span class="text-[16px] text-gray-400 mt-1">
                        <?= date('M d, Y', strtotime($msg['created_at'])) ?>
                    </span>
                </div>
            </div>
            
            <div class="pl-13">
                <p class="text-gray-700 leading-relaxed text-md">
                    <?= nl2br(htmlspecialchars($msg['message'])) ?>
                </p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
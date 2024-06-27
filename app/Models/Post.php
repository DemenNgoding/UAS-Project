<?php 
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Post extends Model
    {
        use HasFactory;

        protected $fillable = [
            'title',
            'caption',
            'image',
        ];

        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function likedUsers()
        {
            return $this->belongsToMany(User::class, 'post_user_likes');
        }
    }
?>
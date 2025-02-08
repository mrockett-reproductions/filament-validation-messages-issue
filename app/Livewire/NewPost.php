<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Post;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class NewPost extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->model(Post::class)
            ->schema([
                TextInput::make('title')
                    ->autofocus()
                    ->required()
                    ->string()
                    ->maxLength(100)
                    ->reactive()
                    ->debounce()
                    ->unique('posts')
                    ->validationMessages([
                        'required' => 'A title is required.',
                        'max' => 'Your title can’t be more than :max characters long.',
                        'unique' => 'A post with that title has already been opened.',
                    ]),
            ]);
    }

    public function updated(string $property): void
    {
        $this->validateOnly($property);
    }

    public function create(): void
    {
        $data = $this->form->getState();
        //
    }
}

<link href="{{ asset('dashboard/css/modern.css') }}" rel="stylesheet">
{{-- <link href="{{ asset('dashboard/css/classic.css') }}" rel="stylesheet">
<link href="{{ asset('dashboard/css/dark.css') }}" rel="stylesheet">
<link href="{{ asset('dashboard/css/light.css') }}" rel="stylesheet"> --}}
<link href="{{ asset('dashboard/css/custom.css') }}" rel="stylesheet">
<style>
  .message {
    margin: 6px 0;
    padding: 10px 14px;
    border-radius: 8px;
    max-width: 80%;
    word-break: break-word;
  }
  .user {
    background-color: #d1e7dd;
    align-self: flex-end;
  }
  .bot {
    background-color: #f8d7da;
    align-self: flex-start;
  }
  .typing {
    display: flex;
    gap: 4px;
    padding: 8px;
    align-self: flex-start;
  }
  .dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #aaa;
    animation: blink 1s infinite;
  }
  .dot:nth-child(2) { animation-delay: 0.2s; }
  .dot:nth-child(3) { animation-delay: 0.4s; }

  @keyframes blink {
    0%, 80%, 100% { opacity: 0; }
    40% { opacity: 1; }
  }

  .suggestion-bubble {
    padding: 10px 15px;
    background-color: #e0f0ff;
    border: 2px solid #174b79;
    border-radius: 20px 5px 20px 5px;
    cursor: pointer;
    max-width: 80%;
    align-self: flex-start;
    transition: 0.3s;
  }

  .suggestion-bubble:hover {
    background-color: #d0e8ff;
  }
</style>
